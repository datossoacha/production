<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Departamentos
    Route::apiResource('departamentos', 'DepartamentosApiController');

    // Municipios
    Route::apiResource('municipios', 'MunicipiosApiController');

    // Comunas
    Route::post('comunas/media', 'ComunasApiController@storeMedia')->name('comunas.storeMedia');
    Route::apiResource('comunas', 'ComunasApiController');

    // Reportes Sgen
    Route::apiResource('reportes-sgens', 'ReportesSgenApiController');

    // Reportes Sgob
    Route::apiResource('reportes-sgobs', 'ReportesSgobApiController');

    // Reportes Ssal
    Route::apiResource('reportes-ssals', 'ReportesSsalApiController');

    // Reportes Spln
    Route::apiResource('reportes-splns', 'ReportesSplnApiController');

    // Reportes Shac
    Route::apiResource('reportes-shacs', 'ReportesShacApiController');

    // Reportes Sdes
    Route::apiResource('reportes-sdes', 'ReportesSdesApiController');

    // Reportes Sedu
    Route::apiResource('reportes-sedus', 'ReportesSeduApiController');

    // Reportes Sinf
    Route::apiResource('reportes-sinfs', 'ReportesSinfApiController');

    // Reportes Smov
    Route::apiResource('reportes-smovs', 'ReportesSmovApiController');

    // Reportes Irdp
    Route::apiResource('reportes-irdps', 'ReportesIrdpApiController');

    // Reporte Esem
    Route::apiResource('reporte-esems', 'ReporteEsemApiController');

    // Reportes Oajm
    Route::apiResource('reportes-oajms', 'ReportesOajmApiController');

    // Sed Repitencia
    Route::apiResource('sed-repitencia', 'SedRepitenciaApiController');

    // Sed Cobertura
    Route::apiResource('sed-coberturas', 'SedCoberturaApiController');

    // Sed Desercion
    Route::apiResource('sed-desercions', 'SedDesercionApiController');

    // Sed Recursos
    Route::apiResource('sed-recursos', 'SedRecursosApiController');

    // Sed Estimulos Gestores
    Route::apiResource('sed-estimulos-gestores', 'SedEstimulosGestoresApiController');

    // Sed Planta Personal
    Route::apiResource('sed-planta-personals', 'SedPlantaPersonalApiController');

    // Sed Participacion Artistas
    Route::apiResource('sed-participacion-artista', 'SedParticipacionArtistasApiController');

    // Instituciones
    Route::apiResource('instituciones', 'InstitucionesApiController');

    // Jornadas
    Route::apiResource('jornadas', 'JornadasApiController');

    // Sede
    Route::apiResource('sedes', 'SedeApiController');

    // Matricula Municipal
    Route::apiResource('matricula-municipals', 'MatriculaMunicipalApiController');

    // Sed Calificacion Docente
    Route::apiResource('sed-calificacion-docentes', 'SedCalificacionDocenteApiController');

    // Sed Transporte
    Route::apiResource('sed-transportes', 'SedTransporteApiController');

    // Sed Alimentacion
    Route::apiResource('sed-alimentacions', 'SedAlimentacionApiController');

    // Sed Clasificacion Saber
    Route::apiResource('sed-clasificacion-sabers', 'SedClasificacionSaberApiController');

    // Sed Biblio Usuarios
    Route::apiResource('sed-biblio-usuarios', 'SedBiblioUsuariosApiController');

    // Sed Artistica Formaciones
    Route::apiResource('sed-artistica-formaciones', 'SedArtisticaFormacionesApiController');
});
