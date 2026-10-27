<?php

namespace Database\Seeders;

use App\Models\ContactMessage;
use App\Models\FirmSetting;
use App\Models\PracticeArea;
use App\Models\Role;
use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SiteContentSeeder extends Seeder
{
    /**
     * Run the database seeds for all site contents and default admin user.
     */
    public function run(): void
    {
        // 1. Roles del Sistema
        $adminRole = Role::updateOrCreate(
            ['slug' => 'admin'],
            [
                'name' => 'Administrador',
                'description' => 'Control total del despacho, configuración del sistema, gestión de usuarios y contenidos.',
            ]
        );

        $editorRole = Role::updateOrCreate(
            ['slug' => 'editor'],
            [
                'name' => 'Editor de Contenido',
                'description' => 'Gestión de especialidades jurídicas, equipo de abogados e información pública.',
            ]
        );

        $consultorRole = Role::updateOrCreate(
            ['slug' => 'abogado'],
            [
                'name' => 'Abogado / Consultor',
                'description' => 'Recepción, atención y seguimiento de solicitudes de consulta legal.',
            ]
        );

        // 2. Usuario Administrador por Defecto (admin@dimo.com / admin123)
        User::updateOrCreate(
            ['email' => 'admin@dimo.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('admin123'),
                'role_id' => $adminRole->id,
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        // Garantizar también compatibilidad institucional con admin@dimo.com.co
        User::updateOrCreate(
            ['email' => 'admin@dimo.com.co'],
            [
                'name' => 'Administrador DIMO',
                'password' => Hash::make('admin123'),
                'role_id' => $adminRole->id,
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        // 3. Áreas de Práctica Jurídica (Estrategias y Soluciones)
        $practiceAreas = [
            [
                'title' => 'Derecho Corporativo y M&A',
                'slug' => 'derecho-corporativo-m-a',
                'description' => 'Estructuración societaria de alta precisión, gobierno corporativo y blindaje transaccional para operaciones complejas.',
                'icon' => 'corporate_fare',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Litigios Complejos y Arbitraje',
                'slug' => 'litigios-complejos-y-arbitraje',
                'description' => 'Defensa técnica e investigativa en escenarios de alta conflictividad ante tribunales arbitrales y altas cortes.',
                'icon' => 'account_balance',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Investigación Forense y Control de Riesgos',
                'slug' => 'investigacion-forense-y-control-de-riesgos',
                'description' => 'Metodologías operativas orientadas al análisis de variables probatorias y auditoría preventiva de riesgos procesales.',
                'icon' => 'manage_search',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Seguridad Jurídica y Compliance',
                'slug' => 'seguridad-juridica-y-compliance',
                'description' => 'Diseño de programas de cumplimiento normativo y salvaguarda patrimonial bajo la jurisprudencia de cierre.',
                'icon' => 'shield',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($practiceAreas as $area) {
            PracticeArea::updateOrCreate(['title' => $area['title']], $area);
        }

        // 4. Equipo Jurídico de la Firma (Nuestra Firma / ¿Quiénes somos?)
        $team = [
            [
                'name' => 'Dr. Andrés Martínez',
                'role' => 'Socio Director & Arquitecto Jurídico',
                'quote' => 'La defensa es una ciencia rigurosa; combinamos la dogmática clásica con metodologías forenses para asegurar la máxima tutela jurídica.',
                'email' => 'a.martinez@dimo.com',
                'linkedin_url' => 'https://linkedin.com',
                'image_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBw7_ADBgZcDB4yW8cbvStlrh4ej-qnY-jK_ezo7Pkk1kaRkAFqlcyxvCOsLL0dPZkx6AQPEprnEuPQuAeGncyGOvmdaLu5oU36YuIXNZCgrBhXHO58ajP7PuceismrjVRr1LFnOggrhxA7fA38Bdwqzk4Tz4ZgKoYuVfU6AO13drKBueOElVklc_M2bWbTaRSeMiFMRNAyFVcqeespz_mlRrijZe-4SPQ4n7sXpqM6pYrE7x0zNbJGzWmMqMtCAFBBYaO97VFmAOQS',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Dra. Camila Casas',
                'role' => 'Socia & Directora de Litigio Estratégico',
                'quote' => 'No nos limitamos a tramitar expedientes; construimos escenarios de certeza mediante el estudio microscópico de la prueba y la jurisprudencia de cierre.',
                'email' => 'c.casas@dimo.com',
                'linkedin_url' => 'https://linkedin.com',
                'image_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCHl4HPc0ugKsF7mZqOPbRxNssTNK5J98HPQxC9gVh9yJwRDzZEf1z-sWojmXZggZrZ685Vv9NlOL1051q2JZhEDipaBnqyQ6UcYnPnsiUR_7JANfei8vCOYJp6XwnCj86FSc_4LNj5cucL0qTOnJ1Tubw6yfUkBFEPmBkd19qZjdnLjBVdBe7FrkpcqauFGYmu6dlYemA0KdBdlL5VJFU3oOCKiz6yI8BeR_7SdatmMEEyR67qk6Sv70XHyog7VhFRLsKAsW74jQg_',
                'sort_order' => 2,
                'is_active' => true,
            ],
        ];

        foreach ($team as $member) {
            TeamMember::updateOrCreate(['name' => $member['name']], $member);
        }

        // 5. Configuración y Textos Globales del Sitio Web (100% Personalizable)
        $settings = [
            'firm_name' => 'myclegalgroup.com',
            'firm_short_name' => 'myclegalgroup.com',
            'firm_slogan' => 'La Ciencia del Derecho aplicada a la Certeza de su Defensa.',
            'footer_slogan' => 'Excelencia jurídica y rigor técnico al servicio de su seguridad y patrimonio.',
            'since_year' => '1994',
            'hero_badge' => 'Desde 1994 • Alta Precisión Forense',
            'hero_title' => 'Arquitectura Jurídica Superior y Control Integral de Riesgos Legales',
            'hero_subtitle' => 'Garantizamos la Máxima Tutela de sus Derechos',
            'hero_phrase' => 'Mediante el Diseño de Metodologías Operativas Orientadas a la Eficacia Procesal y la Prevalencia de la Seguridad Jurídica en Escenarios de Alta Conflictividad.',
            'hero_image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBwDg6y45y18okSbZT34ztaF_Dq8VCfy-M3_SojFYOH3ndbNBNSxh9uk1M1mRHcDYeaZFZ1LnJ_eLE3LVm1_GEnNfpLEoZ2BQVEp5SYeQp8QiN_fFj06zea_Z8WrWI2bS3-3yWPrd4T2TNivUD5MGUexppDsEzDLG11O5jL7yIpdOHFP90q8JzRT7U8QgbvPSBQx8AqnWkbAz71lVGsgtXBfCu0q4oz0ZFJyDgXuNRy_NjAjRZ-zYsKTKmeVCDf8iAaXr3F5hu1m47z',
            'success_rate' => '98',
            'stats_label' => 'Casos Exitosos',
            'stats_desc' => 'Prevalencia de seguridad jurídica en litigios de alta cuantía.',
            'fundamento_1_title' => 'Rigor Normativo',
            'fundamento_1_desc' => 'Nuestra práctica se fundamenta en un estudio exhaustivo y milimétrico de la norma colombiana, garantizando que cada estrategia esté blindada por la dogmática jurídica más sólida.',
            'fundamento_2_title' => 'Ingenio y Estrategia Legal',
            'fundamento_2_desc' => 'Abordamos cada desafío con una visión creativa y disruptiva, diseñando soluciones a medida que trascienden el litigio convencional para asegurar el éxito de nuestros representados.',
            'fundamento_3_title' => 'Precisión y Minuciosidad',
            'fundamento_3_desc' => 'En el Derecho, el detalle es la diferencia entre el éxito y el riesgo. Analizamos cada variable probatoria con una metodología forense de alta precisión.',
            'fundamento_4_title' => 'Excelencia Corporativa',
            'fundamento_4_desc' => 'Operamos bajo los más estrictos estándares de ética y confidencialidad, proyectando la seriedad de una firma de alcance global.',
            'metodo_title' => 'EL METODO DIMO: INGENIERIA JURIDICA DE PRECISIÓN',
            'estacion_1_title' => 'Auditoría y Diagnóstico',
            'estacion_1_sub' => '(El Cimiento)',
            'estacion_1_desc' => 'Análisis microscópico de las fuentes del derecho y auditoría de riesgos procesales.',
            'estacion_2_title' => 'Arquitectura de Estrategia',
            'estacion_2_sub' => '(El Blindaje)',
            'estacion_2_desc' => 'Diseño de la estructura argumentativa bajo el rigor de la dogmática jurídica y la jurisprudencia de cierre.',
            'estacion_3_title' => 'Despliegue Operativo',
            'estacion_3_sub' => '(La Acción)',
            'estacion_3_desc' => 'Ejecución técnica impecable en el escenario litigioso, garantizando la prevalencia de la seguridad jurídica.',
            'estacion_4_title' => 'Resolución y Resultado',
            'estacion_4_sub' => '(El Éxito)',
            'estacion_4_desc' => 'Obtención de soluciones jurídicas de alto impacto y protección definitiva de los intereses de la firma.',
            'x_widget_title' => 'Perspectiva Legal en Tiempo Real: Monitoreo Jurídico DIMO',
            'x_widget_subtitle' => 'Siga nuestro análisis directo sobre la evolución del derecho y la seguridad jurídica en Colombia.',
            'x_button_text' => 'SEGUIR EL DEBATE JURÍDICO EN X',
            'x_button_url' => 'https://x.com',
            'x_post_1_entity' => 'Corte Suprema de Justicia',
            'x_post_1_time' => 'Hace 3h',
            'x_post_1_text' => '⚖️ Corte Suprema de Justicia: En reciente pronunciamiento sobre carga probatoria en controversias societarias, se ratifica la necesidad de auditoría documental previa. La dogmática no tolera improvisaciones procesales.',
            'x_post_2_entity' => 'Consejo de Estado',
            'x_post_2_time' => 'Ayer',
            'x_post_2_text' => '🏛️ Consejo de Estado: La prevalencia de la seguridad jurídica exige un análisis microscópico de los actos administrativos en litigios contractuales. Análisis de riesgos disponible para nuestros clientes corporativos.',
            'x_post_3_entity' => 'Control de Riesgos',
            'x_post_3_time' => '3d',
            'x_post_3_text' => '🔍 Control de Riesgos: Diseñamos la arquitectura argumentativa que anticipa los escenarios de alta conflictividad antes de acudir al tribunal arbitral. La defensa es una ciencia de alta precisión.',
            'about_title' => 'DIMO: Arquitectura Jurídica y Rigor Estratégico al Servicio de la Justicia.',
            'about_p1' => 'En Defensa, Investigación y Metodologías Operacionales (DIMO), concebimos el ejercicio del derecho como una disciplina de alta precisión. Nuestra firma nace de la necesidad de ofrecer soluciones jurídicas disruptivas en un entorno normativo complejo, donde la interpretación literal ya no es suficiente.',
            'about_p2' => 'Nos distinguimos por una minuciosa observancia de las fuentes del derecho colombiano, integrando la dogmática clásica con las herramientas operativas más avanzadas para garantizar la máxima tutela de los intereses de nuestros representados.',
            'about_image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBwDg6y45y18okSbZT34ztaF_Dq8VCfy-M3_SojFYOH3ndbNBNSxh9uk1M1mRHcDYeaZFZ1LnJ_eLE3LVm1_GEnNfpLEoZ2BQVEp5SYeQp8QiN_fFj06zea_Z8WrWI2bS3-3yWPrd4T2TNivUD5MGUexppDsEzDLG11O5jL7yIpdOHFP90q8JzRT7U8QgbvPSBQx8AqnWkbAz71lVGsgtXBfCu0q4oz0ZFJyDgXuNRy_NjAjRZ-zYsKTKmeVCDf8iAaXr3F5hu1m47z',
            'propuesta_title' => 'Nuestra Propuesta de Valor (El Factor DIMO)',
            'propuesta_subtitle' => 'Más allá de la Representación: Ingeniería de Soluciones Jurídicas',
            'propuesta_text' => 'Lo que nos distingue en el foro jurídico es nuestra capacidad de amalgamar la dogmática pura con metodologías de análisis técnico-forense. No nos limitamos a la gestión de expedientes; construimos escenarios de éxito mediante el estudio milimétrico de la prueba y la aplicación de la jurisprudencia de cierre. En DIMO, la defensa es una ciencia y la estrategia, nuestra mayor ventaja competitiva.',
            'valor_1_title' => 'Rigor Normativo',
            'valor_1_desc' => 'Nuestra brújula es la norma. Escudriñamos las fuentes del derecho para hallar la solución donde otros solo ven el conflicto.',
            'valor_2_title' => 'Discreción Estratégica',
            'valor_2_desc' => 'Entendemos la sensibilidad de los intereses que custodiamos. El sigilo y la reserva profesional son el pilar de nuestra confianza corporativa.',
            'valor_3_title' => 'Excelencia Técnica',
            'valor_3_desc' => 'Cada documento, cada memorial y cada intervención es el resultado de un proceso de control de calidad jurídica sin precedentes.',
            'alcance_title' => 'Nuestro Alcance',
            'alcance_subtitle' => 'Cobertura Integral en Escenarios de Alta Conflictividad',
            'alcance_text' => 'Operamos con solvencia en todo el territorio nacional, brindando asesoría a personas naturales y jurídicas que requieren un blindaje legal ante desafíos que amenazan su estabilidad patrimonial, libertad o reputación. Nuestra firma es el aliado estratégico para quienes no se conforman con una asesoría convencional.',
            'alcance_image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAeQHO5RS-lkugRJaHNsVZ34vMVNb-4uBPtgkXtyXCCQfWY3wfhMVpes9BGYG85gkl7cOWo2832mKQDqa933ZcX94BoR5HkWZK6XSa9cutMhv2QoSBDlt7KW9kIEXf0CHgwAR1XepJIRvoMNCgmsH87L29kPc-nBLev4Oma68IZyjVBfR43bD0i71BnrkFYdT57sh1zIogZNWsmOaQ22229PH-1hy2OF7Y67r9OD07HGEqfOb7PM1_EJy_ksOKwRpP9urL6p-ATt-oB',
            'mision_text' => 'Nuestra misión es proveer soluciones jurídicas e investigativas de alta complejidad, fundamentadas en un rigor técnico inexpugnable y una lealtad absoluta hacia los intereses de nuestros representados. En DIMO, transformamos el esfuerzo y la disciplina en estrategias de éxito, evolucionando constantemente para garantizar que la excelencia operativa sea el estándar en cada una de nuestras intervenciones. Nuestro propósito es ser el blindaje definitivo para quienes exigen una defensa técnica cimentada en la ciencia del derecho.',
            'vision_text' => 'Para el año 2030, DIMO se consolidará como la firma boutique de referencia integral en el territorio nacional, liderando la convergencia entre el derecho multidisciplinario y la investigación de vanguardia. Proyectamos un crecimiento estratégico sostenido por un capital humano de élite, especializado y con un dominio absoluto de las fuentes del derecho, permitiéndonos ofrecer un portafolio de soluciones jurídicas diversificado que redefina los estándares de la consultoría y el litigio de alto nivel en Colombia.',
            'phone' => '+57 (601) 456 7890',
            'schedule' => 'Lun - Vie, 8am - 6pm',
            'address' => "Calle 100 # 15-32, Edificio Amadeus, Piso 7\nBogotá D.C., Colombia",
            'email' => 'contacto@dimo.com',
            'office_title' => 'Sede Principal Bogotá',
            'footer_copyright' => '© 2026 DIMO - Defensa, Investigación y Metodologías Operacionales. Todos los derechos reservados. El rigor en la fuente, nuestra garantía jurídica.',
        ];

        foreach ($settings as $key => $value) {
            FirmSetting::set($key, $value);
        }

        // 6. Mensajes de Consulta de Ejemplo
        ContactMessage::updateOrCreate(
            ['email' => 'carlos.mendoza@empresa.com'],
            [
                'name' => 'Carlos Mendoza',
                'subject' => 'Consultoría de Alto Nivel - Riesgo Corporativo',
                'message' => 'Requerimos auditoría y diseño de metodología operativa para blindar una fusión transfronteriza y mitigar contingencias procesales.',
                'status' => 'pending',
                'created_at' => now()->subHours(2),
            ]
        );
    }
}
