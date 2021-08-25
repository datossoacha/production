<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 23,
                'title' => 'variables_globale_access',
            ],
            [
                'id'    => 24,
                'title' => 'departamento_create',
            ],
            [
                'id'    => 25,
                'title' => 'departamento_edit',
            ],
            [
                'id'    => 26,
                'title' => 'departamento_show',
            ],
            [
                'id'    => 27,
                'title' => 'departamento_delete',
            ],
            [
                'id'    => 28,
                'title' => 'departamento_access',
            ],
            [
                'id'    => 29,
                'title' => 'municipio_create',
            ],
            [
                'id'    => 30,
                'title' => 'municipio_edit',
            ],
            [
                'id'    => 31,
                'title' => 'municipio_show',
            ],
            [
                'id'    => 32,
                'title' => 'municipio_delete',
            ],
            [
                'id'    => 33,
                'title' => 'municipio_access',
            ],
            [
                'id'    => 34,
                'title' => 'secretaria_general_access',
            ],
            [
                'id'    => 35,
                'title' => 'secretaria_gobierno_access',
            ],
            [
                'id'    => 36,
                'title' => 'secretaria_salud_access',
            ],
            [
                'id'    => 37,
                'title' => 'secretaria_planeacion_access',
            ],
            [
                'id'    => 38,
                'title' => 'secretaria_hacienda_access',
            ],
            [
                'id'    => 39,
                'title' => 'secretaria_desarrollo_access',
            ],
            [
                'id'    => 40,
                'title' => 'secretaria_educacion_access',
            ],
            [
                'id'    => 41,
                'title' => 'secretaria_infraestructura_access',
            ],
            [
                'id'    => 42,
                'title' => 'secretaria_movilidad_access',
            ],
            [
                'id'    => 43,
                'title' => 'instituto_recreacion_access',
            ],
            [
                'id'    => 44,
                'title' => 'ese_municipal_access',
            ],
            [
                'id'    => 45,
                'title' => 'oficina_juridica_access',
            ],
            [
                'id'    => 46,
                'title' => 'variables_municipio_access',
            ],
            [
                'id'    => 47,
                'title' => 'comuna_create',
            ],
            [
                'id'    => 48,
                'title' => 'comuna_edit',
            ],
            [
                'id'    => 49,
                'title' => 'comuna_show',
            ],
            [
                'id'    => 50,
                'title' => 'comuna_delete',
            ],
            [
                'id'    => 51,
                'title' => 'comuna_access',
            ],
            [
                'id'    => 52,
                'title' => 'reportes_sgen_create',
            ],
            [
                'id'    => 53,
                'title' => 'reportes_sgen_edit',
            ],
            [
                'id'    => 54,
                'title' => 'reportes_sgen_show',
            ],
            [
                'id'    => 55,
                'title' => 'reportes_sgen_delete',
            ],
            [
                'id'    => 56,
                'title' => 'reportes_sgen_access',
            ],
            [
                'id'    => 57,
                'title' => 'reportes_sgob_create',
            ],
            [
                'id'    => 58,
                'title' => 'reportes_sgob_edit',
            ],
            [
                'id'    => 59,
                'title' => 'reportes_sgob_show',
            ],
            [
                'id'    => 60,
                'title' => 'reportes_sgob_delete',
            ],
            [
                'id'    => 61,
                'title' => 'reportes_sgob_access',
            ],
            [
                'id'    => 62,
                'title' => 'reportes_ssal_create',
            ],
            [
                'id'    => 63,
                'title' => 'reportes_ssal_edit',
            ],
            [
                'id'    => 64,
                'title' => 'reportes_ssal_show',
            ],
            [
                'id'    => 65,
                'title' => 'reportes_ssal_delete',
            ],
            [
                'id'    => 66,
                'title' => 'reportes_ssal_access',
            ],
            [
                'id'    => 67,
                'title' => 'reportes_spln_create',
            ],
            [
                'id'    => 68,
                'title' => 'reportes_spln_edit',
            ],
            [
                'id'    => 69,
                'title' => 'reportes_spln_show',
            ],
            [
                'id'    => 70,
                'title' => 'reportes_spln_delete',
            ],
            [
                'id'    => 71,
                'title' => 'reportes_spln_access',
            ],
            [
                'id'    => 72,
                'title' => 'reportes_shac_create',
            ],
            [
                'id'    => 73,
                'title' => 'reportes_shac_edit',
            ],
            [
                'id'    => 74,
                'title' => 'reportes_shac_show',
            ],
            [
                'id'    => 75,
                'title' => 'reportes_shac_delete',
            ],
            [
                'id'    => 76,
                'title' => 'reportes_shac_access',
            ],
            [
                'id'    => 77,
                'title' => 'reportes_sde_create',
            ],
            [
                'id'    => 78,
                'title' => 'reportes_sde_edit',
            ],
            [
                'id'    => 79,
                'title' => 'reportes_sde_show',
            ],
            [
                'id'    => 80,
                'title' => 'reportes_sde_delete',
            ],
            [
                'id'    => 81,
                'title' => 'reportes_sde_access',
            ],
            [
                'id'    => 82,
                'title' => 'reportes_sedu_create',
            ],
            [
                'id'    => 83,
                'title' => 'reportes_sedu_edit',
            ],
            [
                'id'    => 84,
                'title' => 'reportes_sedu_show',
            ],
            [
                'id'    => 85,
                'title' => 'reportes_sedu_delete',
            ],
            [
                'id'    => 86,
                'title' => 'reportes_sedu_access',
            ],
            [
                'id'    => 87,
                'title' => 'reportes_sinf_create',
            ],
            [
                'id'    => 88,
                'title' => 'reportes_sinf_edit',
            ],
            [
                'id'    => 89,
                'title' => 'reportes_sinf_show',
            ],
            [
                'id'    => 90,
                'title' => 'reportes_sinf_delete',
            ],
            [
                'id'    => 91,
                'title' => 'reportes_sinf_access',
            ],
            [
                'id'    => 92,
                'title' => 'reportes_smov_create',
            ],
            [
                'id'    => 93,
                'title' => 'reportes_smov_edit',
            ],
            [
                'id'    => 94,
                'title' => 'reportes_smov_show',
            ],
            [
                'id'    => 95,
                'title' => 'reportes_smov_delete',
            ],
            [
                'id'    => 96,
                'title' => 'reportes_smov_access',
            ],
            [
                'id'    => 97,
                'title' => 'reportes_irdp_create',
            ],
            [
                'id'    => 98,
                'title' => 'reportes_irdp_edit',
            ],
            [
                'id'    => 99,
                'title' => 'reportes_irdp_show',
            ],
            [
                'id'    => 100,
                'title' => 'reportes_irdp_delete',
            ],
            [
                'id'    => 101,
                'title' => 'reportes_irdp_access',
            ],
            [
                'id'    => 102,
                'title' => 'reporte_esem_create',
            ],
            [
                'id'    => 103,
                'title' => 'reporte_esem_edit',
            ],
            [
                'id'    => 104,
                'title' => 'reporte_esem_show',
            ],
            [
                'id'    => 105,
                'title' => 'reporte_esem_delete',
            ],
            [
                'id'    => 106,
                'title' => 'reporte_esem_access',
            ],
            [
                'id'    => 107,
                'title' => 'reportes_oajm_create',
            ],
            [
                'id'    => 108,
                'title' => 'reportes_oajm_edit',
            ],
            [
                'id'    => 109,
                'title' => 'reportes_oajm_show',
            ],
            [
                'id'    => 110,
                'title' => 'reportes_oajm_delete',
            ],
            [
                'id'    => 111,
                'title' => 'reportes_oajm_access',
            ],
            [
                'id'    => 112,
                'title' => 'sed_repitencium_create',
            ],
            [
                'id'    => 113,
                'title' => 'sed_repitencium_edit',
            ],
            [
                'id'    => 114,
                'title' => 'sed_repitencium_show',
            ],
            [
                'id'    => 115,
                'title' => 'sed_repitencium_delete',
            ],
            [
                'id'    => 116,
                'title' => 'sed_repitencium_access',
            ],
            [
                'id'    => 117,
                'title' => 'sed_cobertura_create',
            ],
            [
                'id'    => 118,
                'title' => 'sed_cobertura_edit',
            ],
            [
                'id'    => 119,
                'title' => 'sed_cobertura_show',
            ],
            [
                'id'    => 120,
                'title' => 'sed_cobertura_delete',
            ],
            [
                'id'    => 121,
                'title' => 'sed_cobertura_access',
            ],
            [
                'id'    => 122,
                'title' => 'sed_desercion_create',
            ],
            [
                'id'    => 123,
                'title' => 'sed_desercion_edit',
            ],
            [
                'id'    => 124,
                'title' => 'sed_desercion_show',
            ],
            [
                'id'    => 125,
                'title' => 'sed_desercion_delete',
            ],
            [
                'id'    => 126,
                'title' => 'sed_desercion_access',
            ],
            [
                'id'    => 127,
                'title' => 'sed_recurso_create',
            ],
            [
                'id'    => 128,
                'title' => 'sed_recurso_edit',
            ],
            [
                'id'    => 129,
                'title' => 'sed_recurso_show',
            ],
            [
                'id'    => 130,
                'title' => 'sed_recurso_delete',
            ],
            [
                'id'    => 131,
                'title' => 'sed_recurso_access',
            ],
            [
                'id'    => 132,
                'title' => 'sed_estimulos_gestore_create',
            ],
            [
                'id'    => 133,
                'title' => 'sed_estimulos_gestore_edit',
            ],
            [
                'id'    => 134,
                'title' => 'sed_estimulos_gestore_show',
            ],
            [
                'id'    => 135,
                'title' => 'sed_estimulos_gestore_delete',
            ],
            [
                'id'    => 136,
                'title' => 'sed_estimulos_gestore_access',
            ],
            [
                'id'    => 137,
                'title' => 'sed_planta_personal_create',
            ],
            [
                'id'    => 138,
                'title' => 'sed_planta_personal_edit',
            ],
            [
                'id'    => 139,
                'title' => 'sed_planta_personal_show',
            ],
            [
                'id'    => 140,
                'title' => 'sed_planta_personal_delete',
            ],
            [
                'id'    => 141,
                'title' => 'sed_planta_personal_access',
            ],
            [
                'id'    => 142,
                'title' => 'sed_participacion_artistum_create',
            ],
            [
                'id'    => 143,
                'title' => 'sed_participacion_artistum_edit',
            ],
            [
                'id'    => 144,
                'title' => 'sed_participacion_artistum_show',
            ],
            [
                'id'    => 145,
                'title' => 'sed_participacion_artistum_delete',
            ],
            [
                'id'    => 146,
                'title' => 'sed_participacion_artistum_access',
            ],
            [
                'id'    => 147,
                'title' => 'institucione_create',
            ],
            [
                'id'    => 148,
                'title' => 'institucione_edit',
            ],
            [
                'id'    => 149,
                'title' => 'institucione_show',
            ],
            [
                'id'    => 150,
                'title' => 'institucione_delete',
            ],
            [
                'id'    => 151,
                'title' => 'institucione_access',
            ],
            [
                'id'    => 152,
                'title' => 'jornada_create',
            ],
            [
                'id'    => 153,
                'title' => 'jornada_edit',
            ],
            [
                'id'    => 154,
                'title' => 'jornada_show',
            ],
            [
                'id'    => 155,
                'title' => 'jornada_delete',
            ],
            [
                'id'    => 156,
                'title' => 'jornada_access',
            ],
            [
                'id'    => 157,
                'title' => 'sede_create',
            ],
            [
                'id'    => 158,
                'title' => 'sede_edit',
            ],
            [
                'id'    => 159,
                'title' => 'sede_show',
            ],
            [
                'id'    => 160,
                'title' => 'sede_delete',
            ],
            [
                'id'    => 161,
                'title' => 'sede_access',
            ],
            [
                'id'    => 162,
                'title' => 'matricula_municipal_create',
            ],
            [
                'id'    => 163,
                'title' => 'matricula_municipal_edit',
            ],
            [
                'id'    => 164,
                'title' => 'matricula_municipal_show',
            ],
            [
                'id'    => 165,
                'title' => 'matricula_municipal_delete',
            ],
            [
                'id'    => 166,
                'title' => 'matricula_municipal_access',
            ],
            [
                'id'    => 167,
                'title' => 'sed_calificacion_docente_create',
            ],
            [
                'id'    => 168,
                'title' => 'sed_calificacion_docente_edit',
            ],
            [
                'id'    => 169,
                'title' => 'sed_calificacion_docente_show',
            ],
            [
                'id'    => 170,
                'title' => 'sed_calificacion_docente_delete',
            ],
            [
                'id'    => 171,
                'title' => 'sed_calificacion_docente_access',
            ],
            [
                'id'    => 172,
                'title' => 'sed_transporte_create',
            ],
            [
                'id'    => 173,
                'title' => 'sed_transporte_edit',
            ],
            [
                'id'    => 174,
                'title' => 'sed_transporte_show',
            ],
            [
                'id'    => 175,
                'title' => 'sed_transporte_delete',
            ],
            [
                'id'    => 176,
                'title' => 'sed_transporte_access',
            ],
            [
                'id'    => 177,
                'title' => 'sed_alimentacion_create',
            ],
            [
                'id'    => 178,
                'title' => 'sed_alimentacion_edit',
            ],
            [
                'id'    => 179,
                'title' => 'sed_alimentacion_show',
            ],
            [
                'id'    => 180,
                'title' => 'sed_alimentacion_delete',
            ],
            [
                'id'    => 181,
                'title' => 'sed_alimentacion_access',
            ],
            [
                'id'    => 182,
                'title' => 'sed_clasificacion_saber_create',
            ],
            [
                'id'    => 183,
                'title' => 'sed_clasificacion_saber_edit',
            ],
            [
                'id'    => 184,
                'title' => 'sed_clasificacion_saber_show',
            ],
            [
                'id'    => 185,
                'title' => 'sed_clasificacion_saber_delete',
            ],
            [
                'id'    => 186,
                'title' => 'sed_clasificacion_saber_access',
            ],
            [
                'id'    => 187,
                'title' => 'sed_biblio_usuario_create',
            ],
            [
                'id'    => 188,
                'title' => 'sed_biblio_usuario_edit',
            ],
            [
                'id'    => 189,
                'title' => 'sed_biblio_usuario_show',
            ],
            [
                'id'    => 190,
                'title' => 'sed_biblio_usuario_delete',
            ],
            [
                'id'    => 191,
                'title' => 'sed_biblio_usuario_access',
            ],
            [
                'id'    => 192,
                'title' => 'sed_artistica_formacione_create',
            ],
            [
                'id'    => 193,
                'title' => 'sed_artistica_formacione_edit',
            ],
            [
                'id'    => 194,
                'title' => 'sed_artistica_formacione_show',
            ],
            [
                'id'    => 195,
                'title' => 'sed_artistica_formacione_delete',
            ],
            [
                'id'    => 196,
                'title' => 'sed_artistica_formacione_access',
            ],
            [
                'id'    => 197,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
