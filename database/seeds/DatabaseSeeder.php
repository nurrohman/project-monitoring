<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Model\User;
use App\Model\Project;
use App\Model\ProjectMilestone;
use App\Model\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('users')->truncate();
        DB::table('clients')->truncate();
        DB::table('roles')->truncate();
        DB::table('projects')->truncate();
        DB::table('project_to_users')->truncate();
        DB::table('project_milestones')->truncate();

        $this->call(EmployeeSeeder::class);

        User::create([
            'name'      => 'Administrator',
            'email'     => 'admin@javan.co.id',
            'password'  => bcrypt('1234')
        ]);

        factory(App\Model\User::class, 100)->create()->make();

        factory(App\Model\Client::class, 100)->create()->each(function($client) {

            for ($i = 1; $i <= rand(5,20); $i++) {
                $client->projects()->save(factory(App\Model\Project::class)->make());
            }
        });

        // Inisialisasi Master Data Role
        $roles = [
            'Project Manager', 'Lead Programmer', 'System Analyst',
            'Business Analyst', 'Programmer', 'Application Support',
            'Marketing'
        ];

        foreach ($roles as $role) {
            Role::create(['role' => $role]);
        };

        // Inisialisasi Data Milestone Per Project
        $projects = Project::all();

        foreach ($projects as $project) {

            $start_date = Carbon\Carbon::instance(Faker\Provider\DateTime::dateTimeBetween('-5 years'));

            for ($i = 1; $i <= 4; $i++) {

                $end = $start_date->copy()->addWeeks(3);

                $milestone = new ProjectMilestone(['name' => 'Sprint ' . $i, 'start_date' => $start_date, 'end_date' => $end]);

                $project->milestones()->save($milestone);

                $start_date->addWeeks(3);
            };
        };

        Model::reguard();
    }
}
