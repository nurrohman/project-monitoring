<?php

use Illuminate\Database\Seeder;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Box\Spout\Reader\ReaderFactory;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = new UploadedFile(database_path('seeds/data/employee.xlsx'), 'employee.xlsx');

        $reader = ReaderFactory::create('xlsx');

        $reader->open($file->getRealPath());

        $flag_first = false;

        foreach ($reader->getSheetIterator() as $sheet) {
            foreach ($sheet->getRowIterator() as $row) {

                if ($flag_first === false) {
                    $flag_first = true;
                    continue;
                }

                try {
                    $employee = app(config('auth.providers.employee.model'))->create([
                        'nip'            => $row[0],
                        'name'           => $row[1],
                        'npwp'           => $row[2],
                        'field_of_study' => $row[3],
                        'email'          => $row[4],
                        'birthdate'      => $row[5],
                        'birthplace'     => $row[6],
                        'phone'          => $row[7]
                    ]);

                } catch (\Exception $e) {
                    $this->command->error($e->getMessage());
                }

            }
        }
    }
}
