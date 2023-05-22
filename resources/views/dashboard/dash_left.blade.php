<div class="card-body">
    <div class="list-group list-group-flush"> <a href="{{url('user/dashboard')}}"
            class="list-group-item d-flex justify-content-between align-items-center">Dashboard
            <i class='bx bx-tachometer fs-5'></i></a>
        <a href="{{ url('user/order') }}"
            class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Orders
            <i class='bx bx-cart-alt fs-5'></i></a>
        <a href="{{ url('user/address') }}"
            class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Show Address
            <i class='bx bx-home-smile fs-5'></i></a>
        {{-- <a href="{{ url('user/payment-method') }}"
            class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Payment
            Methods <i class='bx bx-credit-card fs-5'></i></a> --}}
        <a href="{{ url('user/user-details') }}"
            class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Account
            Details <i class='bx bx-user-circle fs-5'></i></a>
        <a href="{{ url('user/change-password') }}"
            class="list-group-item d-flex justify-content-between align-items-center">Change
            Password<i class='bx bxs-key'></i></a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                {{ csrf_field() }}
                <button type="submit" class="list-group-item d-flex w-100 justify-content-between align-items-center bg-transparent">Logout <i class='bx bx-log-out fs-5'></i></button>
        </form>
        
    </div>
</div>