<div class="main-sidebar sidebar-style-2" style="background-color: #34495E">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ route('index') }}">
            <img src="{{ asset('estilo/ngangula.jpg') }}" alt="" width="200" height="50"><br>
            Hospital Ngangula
        </a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown active">
          <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Painel Administrador</span></a>
        </li>
        <li class="menu-header">Starter</li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Gerencie Funcionarios</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('user.index') }}">Funcionarios</a></li>
            <li><a class="nav-link" href="{{  route('user.create') }}">Cadastrar Funcionario</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Gerencie Paciente</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('paciente.index') }}">Lista de pacientes</a></li>
                <li><a class="nav-link" href="{{  route('paciente.create') }}">Cadastrar Paciente</a></li>
              </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Gerencie Medicos</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('medico.index') }}">Lista de medicos</a></li>
                <li><a class="nav-link" href="{{  route('medico.create') }}">Cadastrar medico</a></li>
              </ul>
        </li>

        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Gerencie escala medica</span></a>
              <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{ route('escala.index') }}">Lista de escala medica</a></li>
                  <li><a class="nav-link" href="{{  route('escala.create') }}">Criar eslaca</a></li>
                </ul>
          </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Gerencie Agendamento</span></a>
              <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{ route('agendamento.index') }}">Lista de Agendamento</a></li>
                  <li><a class="nav-link" href="{{  route('listar.agenda') }}">Agendar Consulta</a></li>
                </ul>
          </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Gerencie Prontuario</span></a>
              <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{ route('agendamento.index') }}">Lista de Prontuario</a></li>
                </ul>
          </li>
      </ul>

    </aside>
  </div>
