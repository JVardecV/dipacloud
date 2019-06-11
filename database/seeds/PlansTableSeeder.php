<?php

use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\plan::create([
        	'plan_name'	=> 'DCMonthly',
        	'plan_description' => '<li><i class="fas fa-dollar-sign"></i> <del>Descuento</del></li>
                                <li><i class="fas fa-user-circle"></i> Múltiples inicios de sesión</li>
                                   <li><i class="far fa-hdd"></i> 25 GB de almacenamiento</li>
                                   <li><i class="fas fa-headset"></i> Soporte técnico</li>
                                   <li><i class="far fa-calendar-alt"></i> Acceso 24/7</li>
                                   <li><i class="fas fa-cloud-upload-alt"></i> Subir cualquier tipo de archivos</li>',
        	'plan_price' => '14.990',
          'plan_type' => 'DCMonthly',
        	'name' => 'DipaCloud',
        	'description' => 'Suscripción mensual',
        	'btn_label' => 'Seleccionar plan',
        	'amount' => '14990',
        	'created_at' => \Carbon\Carbon::now(),

        ]);
        App\plan::create([
        	'plan_name'	=> 'DCBiannual',
        	'plan_description' => '<li><i class="fas fa-dollar-sign"></i> Descuento de <b>$19.950</b></li>
                                   <li><i class="fas fa-user-circle"></i> Múltiples inicios de sesión</li>
                                   <li><i class="far fa-hdd"></i> 250 GB de almacenamiento</li>
                                   <li><i class="fas fa-headset"></i> Soporte técnico</li>
                                   <li><i class="far fa-calendar-alt"></i> Acceso 24/7</li>
                                   <li><i class="fas fa-cloud-upload-alt"></i> Subir cualquier tipo de archivos</li>',
        	'plan_price' => '69.990',
            'plan_type' => 'DCBiannual',
        	'name' => 'DipaCloud',
        	'description' => 'Suscripción semestral',
        	'btn_label' => 'Seleccionar plan',
        	'amount' => '69990',
        	'created_at' => \Carbon\Carbon::now(),
        ]);
        App\plan::create([
        	'plan_name'	=> 'DCAnnual',
        	'plan_description' => '<li><i class="fas fa-dollar-sign"></i> Descuento de <b>$38.890</b></li>
                                   <li><i class="fas fa-user-circle"></i> Múltiples inicios de sesión</li>
                                   <li><i class="far fa-hdd"></i> 350 GB de almacenamiento</li>
                                   <li><i class="fas fa-headset"></i> Soporte técnico</li>
                                   <li><i class="far fa-calendar-alt"></i> Acceso 24/7</li>
                                   <li><i class="fas fa-cloud-upload-alt"></i> Subir cualquier tipo de archivos</li>',
        	'plan_price' => '149.990',
            'plan_type' => 'DCAnnual',
        	'name' => 'DipaCloud',
        	'description' => 'Suscripción anual',
        	'btn_label' => 'Seleccionar plan',
        	'amount' => '149990',
        	'created_at' => \Carbon\Carbon::now(),

        ]);
    }
}
