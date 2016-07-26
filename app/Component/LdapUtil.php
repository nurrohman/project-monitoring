<?php
/**
 * Created by PhpStorm.
 * User: Purwa
 * Date: 6/26/2015
 * Time: 2:12 PM
 */
namespace app\Component;

use App\Http\Controllers\Auth\AuthController;
use App\Model\User;

class LdapUtil
{

    private $params = [
        'ldapUrl' => 'ldap://ldap.javan.co.id',

        'ldapAdminDn' => 'cn=admin,dc=javan,dc=co,dc=id',
        'ldapPassword' => 'kambingbakarcairo',

        'searchDn' => 'ou=people,dc=javan,dc=co,dc=id',

        'ldapLogin' => 'mail={username}',

    ];

    public function cekKoneksiLdap($params = [])
    {
        $ldaprDn = "";
        $password = "";
        $adServer = "";

        if (empty($params)) {
            $params['ldapAdminDn'] = isset($params['ldapAdminDn']) ? $params['ldapAdminDn'] : "";
            $params['ldapPassword'] = isset($params['ldapPassword']) ? $params['ldapPassword'] : "";
            $params['ldapUrl'] = isset($params['ldapUrl']) ? $params['ldapUrl'] : "";
        }
        $ldaprDn = $params['ldapAdminDn'];
        $password = $params['ldapPassword'];
        $adServer = $params['ldapUrl'];

        $ldap = @ldap_connect($adServer);

        ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

        $bind = @ldap_bind($ldap, $ldaprDn, $password);
        return ['status' => $bind, 'ldap' => $ldap, 'opt' => $params];

    }

    public function cekUsername($username, $upassword)
    {

        $params = $this->params;
        $ldapStatus = $this->cekKoneksiLdap($params);

        if ($ldapStatus['status']) {

            $searchDn = $params['searchDn'];
            $ldapLogin = $params['ldapLogin'];

            $filter = str_replace("{username}", $username, $ldapLogin);
            $ldap = $ldapStatus['ldap'];
            $result = ldap_search($ldap, $searchDn, $filter);
            ldap_sort($ldap, $result, "sn");
            $info = ldap_get_entries($ldap, $result);
            if ($info['count'] == 1) {
                $principal = ($info[0]['dn']);
                if (@ldap_bind($ldap, $principal, $upassword)) {
                    return $this->sendResult(true, "Username Ditemukan Di LDAP", $info[0]);
                }
                return $this->sendResult(false, "");
            } else {
                $msg = "Username / Password Invalid";
                return $this->sendResult(false, $msg);
            }
            @ldap_close($ldap);

        } else {

            $msg = "Ldap Server Access Denied!";
            return $this->sendResult(false, $msg);
        }
    }


    public function getLdap()
    {

        $params = $this->params;
        $ldapStatus = $this->cekKoneksiLdap($params);

        if ($ldapStatus['status']) {

            $searchDn = $params['searchDn'];
            $ldap = $ldapStatus['ldap'];
            $result = ldap_search($ldap, $searchDn, "(&(uid=*))");
            $info = ldap_get_entries($ldap, $result);
            if ($info['count'] >= 1) {

                for ($i = 0; $i < $info["count"]; $i++) {
                    User::firstOrNew($this->formatArray($info[$i]));
                }

            } else {
                $msg = "Username / Password Invalid";
                return $this->sendResult(false, $msg);
            }

        } else {

            $msg = "Ldap Server Access Denied!";
            return $this->sendResult(false, $msg);
        }
    }

    private function sendResult($status, $msg, $object = null)
    {
        return ['status' => $status, 'msg' => $msg, 'object' => (!is_null($object) ? $this->formatArray($object) : null)];
    }

    private function formatArray($objec)
    {
        return ['name' => $objec['sn'][0],
            'email' => $objec['mail'][0],
            'password' => $objec['userpassword'][0]];
    }
}
