<!DOCTYPE html>
<html lang="en">
<?php include '../auto_include.php'?>
<?php include '../include.php'?>

</aside>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
          <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Users</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Users</h6>
      </nav>
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">

        </div>
        <ul class="navbar-nav  justify-content-end">
          <li class="nav-item d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
              <i class="fa fa-user me-sm-1 "></i>
              <span class="d-sm-inline d-none" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Logout">

                <?=$_SESSION['useruid'];?>

              </span>
            </a>
          </li>


          <li class="nav-item px-2 d-flex align-items-center">

          </li>
          <li class="nav-item dropdown pe-2 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown"
              aria-expanded="false">
              <i class="fa fa-bell cursor-pointer"></i>
            </a>
            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">

            
              <li class="mb-2">
                <a class="dropdown-item border-radius-md" href="javascript:;">
                  <div class="d-flex py-1">
                    <div class="my-auto">
                      <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="text-sm font-weight-normal mb-1">
                        <span class="font-weight-bold">New message</span> from Laur
                      </h6>
                      <p class="text-xs text-secondary mb-0 ">
                        <i class="fa fa-clock me-1"></i>
                        13 minutes ago
                      </p>
                    </div>
                  </div>
                </a>
              </li>
              <li class="mb-2">
                <a class="dropdown-item border-radius-md" href="javascript:;">
                  <div class="d-flex py-1">
                    <div class="my-auto">
                      <img src="../assets/img/small-logos/logo-spotify.svg"
                        class="avatar avatar-sm bg-gradient-dark  me-3 ">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="text-sm font-weight-normal mb-1">
                        <span class="font-weight-bold">New album</span> by Travis Scott
                      </h6>
                      <p class="text-xs text-secondary mb-0 ">
                        <i class="fa fa-clock me-1"></i>
                        1 day
                      </p>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a class="dropdown-item border-radius-md" href="javascript:;">
                  <div class="d-flex py-1">
                    <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                      <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>credit-card</title>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                            <g transform="translate(1716.000000, 291.000000)">
                              <g transform="translate(453.000000, 454.000000)">
                                <path class="color-background"
                                  d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                  opacity="0.593633743"></path>
                                <path class="color-background"
                                  d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                </path>
                              </g>
                            </g>
                          </g>
                        </g>
                      </svg>
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="text-sm font-weight-normal mb-1">
                        Payment successfully completed
                      </h6>
                      <p class="text-xs text-secondary mb-0 ">
                        <i class="fa fa-clock me-1"></i>
                        2 days
                      </p>
                    </div>
                  </div>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="container-fluid py-4">

    <div class="row my-4">

      <div class="d-flex justify-content-center mb-3 ">

        <form action="/app/incl/admin.inc.php" method="POST">
          <button class="btn btn-primary m-3" name="addDay">Compensate 1 Day</button>
 
        <form action="/app/incl/admin.inc.php" method="POST">
          <button class="btn btn-info m-3" name="addWeek">Compensate 1 Week</button>
        </form>

        <form action="/app/incl/admin.inc.php" method="POST">
          <button class="btn btn-success m-3" name="randomize">Random gen</button>
        </form>

        <!-- Open modal and send information from modal to controller -->
        <button type="button" class="btn m-3 btn-behance" data-bs-toggle="modal" data-bs-target="#user-modal">New user</button>

        <div class="modal fade" id="user-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="/app/incl/admin.inc.php" method="POST">
        <div class="mb-3">
          <input type="username" name="useruid" class="form-control" placeholder="Username" aria-label="username">
        </div>
        <div class="mb-3">
          <input type="email" class="form-control" placeholder="email" aria-label="email">
        </div>
        <div class="mb-3">
          <input type="password" class="form-control" placeholder="password" aria-label="password">
        </div>

       
      
        
      </div>
      <div class="modal-footer">


        <button class="btn btn-primary m-3" name="aUser">Create user</button>

        
      </div>
    </div>
  </div>
  </form>
</div>

     

      </div>

    </div>


    <div class="row my-4">

      <div class="card">
        <div class="table-responsive">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Subscription
                </th>
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "../app/classes/db.class.php";
              include "../app/classes/admin.class.php";
              include "../app/controllers/admin.cont.php";
              $admin = new AdminCont();
              $admin->showUsers();

              foreach($admin->showUsers() as $user) {

              ?>

              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div>
                      <?php
                        echo '<img class="small-img" src="/app/uploads/profile'.$user['id'].'.jpg" class="img-fluid rounded-circle" alt="profile">';
                      ?>
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">
                        <?php echo $user['users_uid']; ?>
                      </h6>
                      <p class="mb-0 text-sm">
                        <?php echo $user['users_email']; ?>
                      </p>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0">
                    <?php echo $user['role']; ?>
                  </p>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="badge badge-sm bg-gradient-success">
                    <?php echo $user['subscription']; ?>
                  </span>
                </td>
                <td class="align-middle">
                  <button type="button" class="btn btn-block bg-gradient-primary mb-3" data-bs-toggle="modal"
                    data-bs-target="#modal-default">Actions</button>
                  <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default"
                    aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h6 class="modal-title" id="modal-title-default">User actions</h6>
                          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="d-flex justify-content-center mb-3">
                            <form action="../app/incl/admin.inc.php?id=<?php echo $user['users_uid']?>" method="POST">
                              <select class="form-control" name="actions" >
                                <option value="view">View Actions</option>
                                <option value="delete">Delete User</option>
                                <option value="resethwid">Reset HWID</option>
                                <option value="geninv">Generate Invite</option>
                                <option value="gentoken">Give token</option>
                              </select>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button name="submit" class="btn bg-gradient-primary" onclick="soft.showSwal('warning-message-and-confirmation')">Confirm</button>
                          <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                      </form>

                </td>
                <?php }?>
            </tbody>
          </table>
        </div>
      </div>

      
      <div class="card  col-4 m-2">
        <div class="table-responsive">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>

                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">user</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">action
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">time
                </th>
                
              </tr>
            </thead>
            <tbody>
            
              <?php
              $uid = '';


include "../app/classes/utility.class.php";
include "../app/controllers/utility.cont.php";
$uid = '';
$utility = new UtilityCont($uid);
$utility->displayNotifications();

foreach ($utility->displayNotifications() as $notification) {
                

              ?>

              <tr>
                <td>
                  
                  
                      
          
                  
                  
                        <?php echo $notification['user']; ?>
                  
                </td>
                <td>
                
                    <?php echo $notification['action']; ?>

                </td>

                <td>
                
                    <?php echo $notification['datetime']; ?>
</td>


                <?php }?>
            </tbody>
          </table>
        </div>
      </div>




    </div>


  </div>
</main>

<!--   Core JS Files   -->
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="../assets/js/plugins/chartjs.min.js"></script>

<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.6"></script>
<script src="../assets/js/plugins/sweetalert.min.js"></script>
</body>

</html>