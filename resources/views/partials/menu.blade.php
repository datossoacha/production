<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('variables_globale_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/departamentos*") ? "c-show" : "" }} {{ request()->is("admin/municipios*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.variablesGlobale.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('departamento_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.departamentos.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/departamentos") || request()->is("admin/departamentos/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-map-marked-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.departamento.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('municipio_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.municipios.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/municipios") || request()->is("admin/municipios/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-map-pin c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.municipio.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('variables_municipio_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/comunas*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-map-marked-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.variablesMunicipio.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('comuna_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.comunas.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/comunas") || request()->is("admin/comunas/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-map-marker-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.comuna.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('secretaria_general_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/reportes-sgens*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-building c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.secretariaGeneral.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('reportes_sgen_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.reportes-sgens.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/reportes-sgens") || request()->is("admin/reportes-sgens/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-list-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.reportesSgen.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('secretaria_gobierno_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/reportes-sgobs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-university c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.secretariaGobierno.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('reportes_sgob_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.reportes-sgobs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/reportes-sgobs") || request()->is("admin/reportes-sgobs/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-list-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.reportesSgob.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('secretaria_salud_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/reportes-ssals*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-user-md c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.secretariaSalud.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('reportes_ssal_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.reportes-ssals.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/reportes-ssals") || request()->is("admin/reportes-ssals/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-list-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.reportesSsal.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('secretaria_planeacion_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/reportes-splns*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-archway c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.secretariaPlaneacion.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('reportes_spln_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.reportes-splns.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/reportes-splns") || request()->is("admin/reportes-splns/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-list-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.reportesSpln.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('secretaria_hacienda_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/reportes-shacs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-hand-holding-usd c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.secretariaHacienda.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('reportes_shac_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.reportes-shacs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/reportes-shacs") || request()->is("admin/reportes-shacs/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-list-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.reportesShac.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('secretaria_desarrollo_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/reportes-sdes*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-chart-line c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.secretariaDesarrollo.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('reportes_sde_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.reportes-sdes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/reportes-sdes") || request()->is("admin/reportes-sdes/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-list-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.reportesSde.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('secretaria_educacion_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/reportes-sedus*") ? "c-show" : "" }} {{ request()->is("admin/instituciones*") ? "c-show" : "" }} {{ request()->is("admin/jornadas*") ? "c-show" : "" }} {{ request()->is("admin/sedes*") ? "c-show" : "" }} {{ request()->is("admin/sed-repitencia*") ? "c-show" : "" }} {{ request()->is("admin/sed-coberturas*") ? "c-show" : "" }} {{ request()->is("admin/sed-desercions*") ? "c-show" : "" }} {{ request()->is("admin/sed-recursos*") ? "c-show" : "" }} {{ request()->is("admin/sed-estimulos-gestores*") ? "c-show" : "" }} {{ request()->is("admin/sed-planta-personals*") ? "c-show" : "" }} {{ request()->is("admin/sed-participacion-artista*") ? "c-show" : "" }} {{ request()->is("admin/matricula-municipals*") ? "c-show" : "" }} {{ request()->is("admin/sed-calificacion-docentes*") ? "c-show" : "" }} {{ request()->is("admin/sed-transportes*") ? "c-show" : "" }} {{ request()->is("admin/sed-alimentacions*") ? "c-show" : "" }} {{ request()->is("admin/sed-clasificacion-sabers*") ? "c-show" : "" }} {{ request()->is("admin/sed-biblio-usuarios*") ? "c-show" : "" }} {{ request()->is("admin/sed-artistica-formaciones*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-book-open c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.secretariaEducacion.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('reportes_sedu_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.reportes-sedus.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/reportes-sedus") || request()->is("admin/reportes-sedus/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-list-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.reportesSedu.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('institucione_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.instituciones.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/instituciones") || request()->is("admin/instituciones/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-building c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.institucione.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('jornada_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.jornadas.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/jornadas") || request()->is("admin/jornadas/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-clock c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.jornada.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('sede_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sedes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sedes") || request()->is("admin/sedes/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-hotel c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.sede.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('sed_repitencium_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sed-repitencia.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sed-repitencia") || request()->is("admin/sed-repitencia/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-play-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.sedRepitencium.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('sed_cobertura_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sed-coberturas.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sed-coberturas") || request()->is("admin/sed-coberturas/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-play-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.sedCobertura.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('sed_desercion_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sed-desercions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sed-desercions") || request()->is("admin/sed-desercions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-play-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.sedDesercion.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('sed_recurso_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sed-recursos.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sed-recursos") || request()->is("admin/sed-recursos/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-play-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.sedRecurso.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('sed_estimulos_gestore_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sed-estimulos-gestores.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sed-estimulos-gestores") || request()->is("admin/sed-estimulos-gestores/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-play-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.sedEstimulosGestore.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('sed_planta_personal_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sed-planta-personals.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sed-planta-personals") || request()->is("admin/sed-planta-personals/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-play-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.sedPlantaPersonal.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('sed_participacion_artistum_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sed-participacion-artista.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sed-participacion-artista") || request()->is("admin/sed-participacion-artista/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-play-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.sedParticipacionArtistum.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('matricula_municipal_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.matricula-municipals.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/matricula-municipals") || request()->is("admin/matricula-municipals/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-play-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.matriculaMunicipal.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('sed_calificacion_docente_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sed-calificacion-docentes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sed-calificacion-docentes") || request()->is("admin/sed-calificacion-docentes/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-play-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.sedCalificacionDocente.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('sed_transporte_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sed-transportes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sed-transportes") || request()->is("admin/sed-transportes/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-play-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.sedTransporte.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('sed_alimentacion_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sed-alimentacions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sed-alimentacions") || request()->is("admin/sed-alimentacions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-play-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.sedAlimentacion.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('sed_clasificacion_saber_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sed-clasificacion-sabers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sed-clasificacion-sabers") || request()->is("admin/sed-clasificacion-sabers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-play-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.sedClasificacionSaber.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('sed_biblio_usuario_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sed-biblio-usuarios.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sed-biblio-usuarios") || request()->is("admin/sed-biblio-usuarios/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-play-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.sedBiblioUsuario.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('sed_artistica_formacione_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sed-artistica-formaciones.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sed-artistica-formaciones") || request()->is("admin/sed-artistica-formaciones/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-play-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.sedArtisticaFormacione.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('secretaria_infraestructura_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/reportes-sinfs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-bezier-curve c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.secretariaInfraestructura.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('reportes_sinf_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.reportes-sinfs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/reportes-sinfs") || request()->is("admin/reportes-sinfs/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-list-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.reportesSinf.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('secretaria_movilidad_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/reportes-smovs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-car c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.secretariaMovilidad.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('reportes_smov_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.reportes-smovs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/reportes-smovs") || request()->is("admin/reportes-smovs/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-list-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.reportesSmov.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('instituto_recreacion_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/reportes-irdps*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-futbol c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.institutoRecreacion.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('reportes_irdp_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.reportes-irdps.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/reportes-irdps") || request()->is("admin/reportes-irdps/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-list-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.reportesIrdp.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('ese_municipal_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/reporte-esems*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-briefcase-medical c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.eseMunicipal.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('reporte_esem_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.reporte-esems.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/reporte-esems") || request()->is("admin/reporte-esems/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-list-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.reporteEsem.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('oficina_juridica_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/reportes-oajms*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-balance-scale c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.oficinaJuridica.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('reportes_oajm_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.reportes-oajms.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/reportes-oajms") || request()->is("admin/reportes-oajms/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-list-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.reportesOajm.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_alert_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.user-alerts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userAlert.title') }}
                </a>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>