  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('admin_lte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        @if(isset($fyear))
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('donar.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Donars
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('needy_person.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Beneficiaries
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('account_costcenter.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Sector
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Fund
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('fund_collection.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fund Collection</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('fund_disbursement.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fund Dispursment</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('fund_recovery.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fund Refund</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('expense.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Expenses</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                General Entries
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('account_bank_payment.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bank Payment</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('account_bank_receipt.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bank Receipt</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('account_cash_payment.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cash Payment</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('account_cash_receipt.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cash Receipt</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('account_journal_entry.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Journal Entry</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('account_bank_transfer.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bank Transfer</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Accounts
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('account_financialyear.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Financial Years</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="{{ route('account_costcenter.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sector</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="{{ route('account_group.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Groups</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('account_ledger.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ledgers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('account_type.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Entry Types</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('account_entry.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Entries</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Reports
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('account_statement') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ledger Statement</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('account_trial_balance') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Trial Balance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('account_income_statement') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Income Statement</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('account_balance_sheet') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Balance Sheet</p>
                </a>
              </li>
            </ul>
          </li>
        @else

          <li class="nav-item">
            <a  class="nav-link">
              <p>
                Need an active Financial Year for other functionalities.
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('account_financialyear.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Financial Year
              </p>
            </a>
          </li>
        @endif  
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>