<div class="main-sidebar sidebar-style-2" style="background-color: #1A2530">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ route('index') }}"><img src="{{ asset('estilo/ngangula.jpg') }}" alt="" width="200" height="50"></a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown active">
          <a href="{{ route('recepcionista.dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Painel do recepcionista</span></a>
        </li>
        <li class="menu-header">Starter</li>

        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Gerencie Paciente</span></a>
              <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{ route('recepcionista.paciente') }}">Lista de pacientes</a></li>
                  <li><a class="nav-link" href="{{  route('recepcionista.paciente.create') }}">Cadastrar Paciente</a></li>
                </ul>
          </li>

        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Gerenciar Consulta</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('recepcionista.consulta') }}">Visualizar Consultas</a></li>
              </ul>
        </li>

        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Visualisar Escala</span></a>
              <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{ route('recepcionista.escala') }}">Lista de escala medica</a></li>
                </ul>
          </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Gerencie Agendamento</span></a>
              <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{ route('recepcionista.agendamento') }}">Lista de Agendamento</a></li>
                  <li><a class="nav-link" href="{{  route('recepcionista.listar.agenda') }}">Agendar Consulta</a></li>
                </ul>
          </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Gerencie Prontuario</span></a>
              <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{ route('prontuario.index') }}">Lista de Prontuario</a></li>
                </ul>
          </li>
      </ul>

    </aside>
  </div>
