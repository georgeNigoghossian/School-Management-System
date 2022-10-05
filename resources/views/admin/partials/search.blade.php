<div class="navigation mb-5">
    <div class="n1">
        <div>
            <i id="menu-btn" class="fa-solid fa-bars"></i>
        </div>
        <div class="search">
            <i class="fa-solid fa-search"></i>
            <form action="{{ route('search') }}" method="GET" >
                <input name='search' type="text" placeholder="Search">
                <button class='form-button' type='submit'>Search</button>
            </form>
        </div>
    </div>

    <div class="profile">

        
        <a class=' btn-noti' href="{{ route('student.notes') }}" title=" messages"><i class="fa-solid fa-bell" aria-hidden="true"></i>
            @if($notes_count>0)
            <span>{{ $notes_count }}</span>
            @endif
        </a>
        <a href={{ route('user.logout') }}>
        <img src="{{ asset('assets/img/user.png') }}">
        </a>
    </div>
</div>