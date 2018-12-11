<li class="nav-item">
    <a class="nav-link {{ !$isAdministration ?: 'active' }}" href="{{ route('admin') }}"><i class="fas fa-sliders-h">&nbsp;</i>Administrace</a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $isAdministration ?: 'active' }}" href="{{ route('log') }}"><i class="fas fa-history">&nbsp;</i>Záznamy</a>
</li>
