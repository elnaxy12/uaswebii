<!-- start sidebar -->
<div id="sideBar"
  class="relative flex flex-col flex-wrap bg-white border-r border-gray-300 p-6 flex-none w-64 md:-ml-64 md:fixed md:top-0 md:z-30 md:h-screen md:shadow-xl animated faster">
  <!-- sidebar content -->
  <div class="flex flex-col">
    <!-- sidebar toggle -->
    <div class="text-right hidden md:block mb-4">
      <button id="sideBarHideBtn">
        <i class="fad fa-times-circle"></i>
      </button>
    </div>
    <!-- end sidebar toggle -->

    <p class="uppercase text-xs text-gray-600 mb-4 tracking-wider">homes</p>

    <!-- link -->
    <a href="{{ route('admin.dashboard.analytics') }}"
      class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
      <i class="fad fa-chart-pie text-xs mr-2"></i>
      Analytics dashboard
    </a>
    <!-- end link -->

    <!-- link -->
    <a href="{{ route('admin.dashboard.ecommerce') }}"
      class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
      <i class="fad fa-shopping-cart text-xs mr-2"></i>
      ecommerce dashboard
    </a>
    <!-- end link -->

    <p class="uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider">apps</p>

    <!-- link -->
    <a href="{{ route('admin.dashboard.users') }}"
      class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
      <i class="fad fa-user text-xs mr-2"></i> User
    </a>
    <!-- end link -->

    <!-- link -->
    {{-- <a href="#"
      class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
      <i class="fad fa-comments text-xs mr-2"></i>
      chat
    </a> --}}
    <!-- end link -->

    <!-- link -->
    <!-- order dropdown -->
    <div class="mb-3">
      <button onclick="toggleOrderMenu()"
        class="w-full flex items-center justify-between capitalize font-medium text-sm hover:text-teal-600 transition duration-300"
        style="outline: none">
        <span>
          <i class="fad fa-shield-check text-xs mr-2"></i>
          Order
        </span>
        <i id="orderArrow" class="fas fa-chevron-left text-xs transition-transform duration-300 transform"></i>
      </button>

      <!-- dropdown -->
      <div id="orderMenu" class="hidden ml-6 mt-2 flex flex-col gap-2 text-xs text-gray-500 outline-none pl-5 ">
        <a href="{{ route('admin.dashboard.pendingOrder') }}"
          class="{{ empty(request('status')) ? 'active-filter' : '' }} hover:text-teal-600 p-1">
          All ({{ $totalOrders }})
        </a>

        <a href="{{ route('admin.dashboard.pendingOrder', ['status' => 'pending']) }}"
          class="{{ request('status') == 'pending' ? 'active-filter' : '' }} hover:text-teal-600 p-1">
          Pending ({{ $pendingOrders }})
        </a>

        <a href="{{ route('admin.dashboard.pendingOrder', ['status' => 'waiting_payment']) }}"
          class="{{ request('status') == 'waiting_payment' ? 'active-filter' : '' }} hover:text-teal-600 p-1">
          Waiting Payment ({{ $waitingPaymentOrders }})
        </a>

        <a href="{{ route('admin.dashboard.pendingOrder', ['status' => 'shipped']) }}"
          class="{{ request('status') == 'shipped' ? 'active-filter' : '' }} hover:text-teal-600 p-1">
          Shipped ({{ $shippedOrders }})
        </a>

        <a href="{{ route('admin.dashboard.pendingOrder', ['status' => 'delivered']) }}"
          class="{{ request('status') == 'delivered' ? 'active-filter' : '' }} hover:text-teal-600 p-1">
          Delivered ({{ $deliveredOrders }})
        </a>

        <a href="{{ route('admin.dashboard.pendingOrder', ['status' => 'canceled']) }}"
          class="{{ request('status') == 'canceled' ? 'active-filter' : '' }} hover:text-teal-600 p-1">
          Canceled ({{ $canceledOrders }})
        </a>
      </div>
    </div>
    <!-- end order dropdown -->

    <!-- end link -->

    <!-- link -->
    <a href="{{ route('admin.dashboard.calender') }}" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
      <i class="fad fa-calendar-edit text-xs mr-2"></i>
      calendar
    </a>
    <!-- end link -->

    <!-- link -->
    <a href="#" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
      <i class="fad fa-file-invoice-dollar text-xs mr-2"></i>
      invoice
    </a>
    <!-- end link -->

    <!-- link -->
    <a href="#" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
      <i class="fad fa-folder-open text-xs mr-2"></i>
      file manager
    </a>
    <!-- end link -->


  </div>
  <!-- end sidebar content -->

</div>
<!-- end sidbar -->

<style>
  .active-filter {
    color: #0d9488;
    font-weight: 600;
    background-color: #f3f4f6;
  }
</style>

<script>
  function toggleOrderMenu() {
    const menu = document.getElementById('orderMenu');
    const arrow = document.getElementById('orderArrow');

    menu.classList.toggle('hidden');
    arrow.classList.toggle('-rotate-90');
  }
</script>