<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Departamentos
    Route::delete('departamentos/destroy', 'DepartamentosController@massDestroy')->name('departamentos.massDestroy');
    Route::resource('departamentos', 'DepartamentosController');

    // Municipios
    Route::delete('municipios/destroy', 'MunicipiosController@massDestroy')->name('municipios.massDestroy');
    Route::resource('municipios', 'MunicipiosController');

    // Comunas
    Route::delete('comunas/destroy', 'ComunasController@massDestroy')->name('comunas.massDestroy');
    Route::post('comunas/media', 'ComunasController@storeMedia')->name('comunas.storeMedia');
    Route::post('comunas/ckmedia', 'ComunasController@storeCKEditorImages')->name('comunas.storeCKEditorImages');
    Route::resource('comunas', 'ComunasController');

    // Reportes Sgen
    Route::delete('reportes-sgens/destroy', 'ReportesSgenController@massDestroy')->name('reportes-sgens.massDestroy');
    Route::resource('reportes-sgens', 'ReportesSgenController');

    // Reportes Sgob
    Route::delete('reportes-sgobs/destroy', 'ReportesSgobController@massDestroy')->name('reportes-sgobs.massDestroy');
    Route::resource('reportes-sgobs', 'ReportesSgobController');

    // Reportes Ssal
    Route::delete('reportes-ssals/destroy', 'ReportesSsalController@massDestroy')->name('reportes-ssals.massDestroy');
    Route::resource('reportes-ssals', 'ReportesSsalController');

    // Reportes Spln
    Route::delete('reportes-splns/destroy', 'ReportesSplnController@massDestroy')->name('reportes-splns.massDestroy');
    Route::resource('reportes-splns', 'ReportesSplnController');

    // Reportes Shac
    Route::delete('reportes-shacs/destroy', 'ReportesShacController@massDestroy')->name('reportes-shacs.massDestroy');
    Route::resource('reportes-shacs', 'ReportesShacController');

    // Reportes Sdes
    Route::delete('reportes-sdes/destroy', 'ReportesSdesController@massDestroy')->name('reportes-sdes.massDestroy');
    Route::resource('reportes-sdes', 'ReportesSdesController');

    // Reportes Sedu
    Route::delete('reportes-sedus/destroy', 'ReportesSeduController@massDestroy')->name('reportes-sedus.massDestroy');
    Route::resource('reportes-sedus', 'ReportesSeduController');

    // Reportes Sinf
    Route::delete('reportes-sinfs/destroy', 'ReportesSinfController@massDestroy')->name('reportes-sinfs.massDestroy');
    Route::resource('reportes-sinfs', 'ReportesSinfController');

    // Reportes Smov
    Route::delete('reportes-smovs/destroy', 'ReportesSmovController@massDestroy')->name('reportes-smovs.massDestroy');
    Route::resource('reportes-smovs', 'ReportesSmovController');

    // Reportes Irdp
    Route::delete('reportes-irdps/destroy', 'ReportesIrdpController@massDestroy')->name('reportes-irdps.massDestroy');
    Route::resource('reportes-irdps', 'ReportesIrdpController');

    // Reporte Esem
    Route::delete('reporte-esems/destroy', 'ReporteEsemController@massDestroy')->name('reporte-esems.massDestroy');
    Route::resource('reporte-esems', 'ReporteEsemController');

    // Reportes Oajm
    Route::delete('reportes-oajms/destroy', 'ReportesOajmController@massDestroy')->name('reportes-oajms.massDestroy');
    Route::resource('reportes-oajms', 'ReportesOajmController');

    // Sed Repitencia
    Route::delete('sed-repitencia/destroy', 'SedRepitenciaController@massDestroy')->name('sed-repitencia.massDestroy');
    Route::resource('sed-repitencia', 'SedRepitenciaController');

    // Sed Cobertura
    Route::delete('sed-coberturas/destroy', 'SedCoberturaController@massDestroy')->name('sed-coberturas.massDestroy');
    Route::resource('sed-coberturas', 'SedCoberturaController');

    // Sed Desercion
    Route::delete('sed-desercions/destroy', 'SedDesercionController@massDestroy')->name('sed-desercions.massDestroy');
    Route::resource('sed-desercions', 'SedDesercionController');

    // Sed Recursos
    Route::delete('sed-recursos/destroy', 'SedRecursosController@massDestroy')->name('sed-recursos.massDestroy');
    Route::post('sed-recursos/parse-csv-import', 'SedRecursosController@parseCsvImport')->name('sed-recursos.parseCsvImport');
    Route::post('sed-recursos/process-csv-import', 'SedRecursosController@processCsvImport')->name('sed-recursos.processCsvImport');
    Route::resource('sed-recursos', 'SedRecursosController');

    // Sed Estimulos Gestores
    Route::delete('sed-estimulos-gestores/destroy', 'SedEstimulosGestoresController@massDestroy')->name('sed-estimulos-gestores.massDestroy');
    Route::post('sed-estimulos-gestores/parse-csv-import', 'SedEstimulosGestoresController@parseCsvImport')->name('sed-estimulos-gestores.parseCsvImport');
    Route::post('sed-estimulos-gestores/process-csv-import', 'SedEstimulosGestoresController@processCsvImport')->name('sed-estimulos-gestores.processCsvImport');
    Route::resource('sed-estimulos-gestores', 'SedEstimulosGestoresController');

    // Sed Planta Personal
    Route::delete('sed-planta-personals/destroy', 'SedPlantaPersonalController@massDestroy')->name('sed-planta-personals.massDestroy');
    Route::post('sed-planta-personals/parse-csv-import', 'SedPlantaPersonalController@parseCsvImport')->name('sed-planta-personals.parseCsvImport');
    Route::post('sed-planta-personals/process-csv-import', 'SedPlantaPersonalController@processCsvImport')->name('sed-planta-personals.processCsvImport');
    Route::resource('sed-planta-personals', 'SedPlantaPersonalController');

    // Sed Participacion Artistas
    Route::delete('sed-participacion-artista/destroy', 'SedParticipacionArtistasController@massDestroy')->name('sed-participacion-artista.massDestroy');
    Route::post('sed-participacion-artista/parse-csv-import', 'SedParticipacionArtistasController@parseCsvImport')->name('sed-participacion-artista.parseCsvImport');
    Route::post('sed-participacion-artista/process-csv-import', 'SedParticipacionArtistasController@processCsvImport')->name('sed-participacion-artista.processCsvImport');
    Route::resource('sed-participacion-artista', 'SedParticipacionArtistasController');

    // Instituciones
    Route::delete('instituciones/destroy', 'InstitucionesController@massDestroy')->name('instituciones.massDestroy');
    Route::post('instituciones/parse-csv-import', 'InstitucionesController@parseCsvImport')->name('instituciones.parseCsvImport');
    Route::post('instituciones/process-csv-import', 'InstitucionesController@processCsvImport')->name('instituciones.processCsvImport');
    Route::resource('instituciones', 'InstitucionesController');

    // Jornadas
    Route::delete('jornadas/destroy', 'JornadasController@massDestroy')->name('jornadas.massDestroy');
    Route::resource('jornadas', 'JornadasController');

    // Sede
    Route::delete('sedes/destroy', 'SedeController@massDestroy')->name('sedes.massDestroy');
    Route::post('sedes/parse-csv-import', 'SedeController@parseCsvImport')->name('sedes.parseCsvImport');
    Route::post('sedes/process-csv-import', 'SedeController@processCsvImport')->name('sedes.processCsvImport');
    Route::resource('sedes', 'SedeController');

    // Matricula Municipal
    Route::delete('matricula-municipals/destroy', 'MatriculaMunicipalController@massDestroy')->name('matricula-municipals.massDestroy');
    Route::post('matricula-municipals/parse-csv-import', 'MatriculaMunicipalController@parseCsvImport')->name('matricula-municipals.parseCsvImport');
    Route::post('matricula-municipals/process-csv-import', 'MatriculaMunicipalController@processCsvImport')->name('matricula-municipals.processCsvImport');
    Route::resource('matricula-municipals', 'MatriculaMunicipalController');

    // Sed Calificacion Docente
    Route::delete('sed-calificacion-docentes/destroy', 'SedCalificacionDocenteController@massDestroy')->name('sed-calificacion-docentes.massDestroy');
    Route::post('sed-calificacion-docentes/parse-csv-import', 'SedCalificacionDocenteController@parseCsvImport')->name('sed-calificacion-docentes.parseCsvImport');
    Route::post('sed-calificacion-docentes/process-csv-import', 'SedCalificacionDocenteController@processCsvImport')->name('sed-calificacion-docentes.processCsvImport');
    Route::resource('sed-calificacion-docentes', 'SedCalificacionDocenteController');

    // Sed Transporte
    Route::delete('sed-transportes/destroy', 'SedTransporteController@massDestroy')->name('sed-transportes.massDestroy');
    Route::post('sed-transportes/parse-csv-import', 'SedTransporteController@parseCsvImport')->name('sed-transportes.parseCsvImport');
    Route::post('sed-transportes/process-csv-import', 'SedTransporteController@processCsvImport')->name('sed-transportes.processCsvImport');
    Route::resource('sed-transportes', 'SedTransporteController');

    // Sed Alimentacion
    Route::delete('sed-alimentacions/destroy', 'SedAlimentacionController@massDestroy')->name('sed-alimentacions.massDestroy');
    Route::post('sed-alimentacions/parse-csv-import', 'SedAlimentacionController@parseCsvImport')->name('sed-alimentacions.parseCsvImport');
    Route::post('sed-alimentacions/process-csv-import', 'SedAlimentacionController@processCsvImport')->name('sed-alimentacions.processCsvImport');
    Route::resource('sed-alimentacions', 'SedAlimentacionController');

    // Sed Clasificacion Saber
    Route::delete('sed-clasificacion-sabers/destroy', 'SedClasificacionSaberController@massDestroy')->name('sed-clasificacion-sabers.massDestroy');
    Route::post('sed-clasificacion-sabers/parse-csv-import', 'SedClasificacionSaberController@parseCsvImport')->name('sed-clasificacion-sabers.parseCsvImport');
    Route::post('sed-clasificacion-sabers/process-csv-import', 'SedClasificacionSaberController@processCsvImport')->name('sed-clasificacion-sabers.processCsvImport');
    Route::resource('sed-clasificacion-sabers', 'SedClasificacionSaberController');

    // Sed Biblio Usuarios
    Route::delete('sed-biblio-usuarios/destroy', 'SedBiblioUsuariosController@massDestroy')->name('sed-biblio-usuarios.massDestroy');
    Route::resource('sed-biblio-usuarios', 'SedBiblioUsuariosController');

    // Sed Artistica Formaciones
    Route::delete('sed-artistica-formaciones/destroy', 'SedArtisticaFormacionesController@massDestroy')->name('sed-artistica-formaciones.massDestroy');
    Route::resource('sed-artistica-formaciones', 'SedArtisticaFormacionesController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
