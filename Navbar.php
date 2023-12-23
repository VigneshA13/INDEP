<div class="row mx-0 nav1">
  <div class="col-12 px-0 z-1 position-absolute">
    <img src="./assets/images/indepback.jpeg" class="img-fluid w-100" id="navImg">
  </div>

  <div class="col-12 px-0 z-2 position-absolute">
    <img src="./assets/images/logo_2k23_24.png" class=" img-fluid  indep" alt="">
  </div>

  <div class="col-12 px-0 z-3 position-absolute">
    <nav class="navbar container">
      <img src="./assets/images/sjcbanner.png" style="height: 10vh;" class="logo sjcLogo">
      <button type="button" id="navbar-toggle" aria-controls="navbar-menu" aria-label="Toggle menu" aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div id="navbar-menu" aria-labelledby="navbar-toggle">
        <ul class="navbar-links ">
          <li class="navbar-item"><a class="navbar-link text-decoration-none" href="index.php">Home</a></li>

          <li class="navbar-item">
            <a class="navbar-link text-decoration-none" href="#" id="nav-link">Events</a>
            <ul class="sub-menu">
              <li class="navbar-item">
                <a class="dropdown-item navbar-link" href="off_stage_events.php" id="dropdown-item">off stage events </a>
              </li>
              <li class="navbar-item">
                <a class="dropdown-item navbar-link" href="on_stage_events.php" id="dropdown-item">On stage events</a>
              </li>
            </ul>
          </li>
          <li class="navbar-item "><a class="navbar-link text-decoration-none" href="Team.php">Teams</a></li>
          <li class="navbar-item">
            <a class="navbar-link text-decoration-none" href="./downloads.php" id="nav-link">Download</a>

          </li>
          <li class="navbar-item"><a class="navbar-link text-decoration-none" href="Contact.php">Contact</a></li>
          <li class="navbar-item"><a class="navbar-link text-decoration-none" href="./dashboard/login.php">Registration</a></li>
        </ul>
      </div>
    </nav>
  </div>

  <div class="col-12 px-0 z-4 position-absolute notification">
    <div class="col-12 col-sm-3 " id="notice">
      <div class="mt-2 border-bottom border-light-subtle">
        <p class="text-center p-2 m-0 fw-bolder fs-4 text-white ">Announcements</sp>
      </div>
      <marquee class="marquee" direction="up" style="height: 300px; " scrollamount=4>

        <?php
        $notice = mysqli_query($con, "SELECT * FROM registration where album = 'notice'");
        if (mysqli_num_rows($notice) > 0) {
          $i = 0;
          while ($noticeData = mysqli_fetch_array($notice)) {
            $i++;
            if ($i % 2 != 0) {
        ?>
              <div class="mt-2 p-2" style="white-space: normal; ">
                <?php if ($noticeData['teamid'] == 1) {
                ?>
                  <a href="<?= $noticeData['teamreg_status'] ?>" target="_blank" class="ms-3 fw-bolder fs-6 " style="color: yellow; margin: 0px; ">
                    <?= $noticeData['file'];
                    if ($noticeData['eventid'] == 1) {
                    ?>
                      <img src="./assets/images/new.gif" alt="new" height="25px" width="50px">
                    <?php } ?>
                  </a>
                <?php
                } elseif ($noticeData['teamid'] == 0) { ?>
                  <p class="ms-3 fw-bolder fs-6 " style="color: yellow; margin: 0px; ">
                    <?= $noticeData['file'];
                    if ($noticeData['eventid'] == 1) {
                    ?>
                      <img src="./assets/images/new.gif" alt="new" height="25px" width="50px">
                    <?php } ?>
                  </p>
                <?php } ?>
              </div>
            <?php
            } elseif ($i % 2 == 0) {
            ?>
              <div class="mt-2 p-2" style="white-space: normal; ">
                <?php if ($noticeData['teamid'] == 1) {
                ?>
                  <a href="<?= $noticeData['teamreg_status'] ?>" target="_blank" class="ms-3 fw-bolder fs-6 " style="color: white; margin: 0px;">
                    <?= $noticeData['file'];
                    if ($noticeData['eventid'] == 1) {
                    ?>
                      <img src="./assets/images/new.gif" alt="new" height="25px" width="50px">
                    <?php } ?>
                  </a>
                <?php } elseif ($noticeData['teamid'] == 0) { ?>
                  <p class="ms-3 fw-bolder fs-6 " style="color: white; margin: 0px;">
                    <?= $noticeData['file'];
                    if ($noticeData['eventid'] == 1) {
                    ?>
                      <img src="./assets/images/new.gif" alt="new" height="25px" width="50px">
                    <?php } ?>
                  </p>
                <?php } ?>
              </div>
        <?php
            }
          }
        }
        ?>

      </marquee>
    </div>
  </div>

  <div class="row g-0 m-0 z-5 position-absolute " id="timers" style="min-height: 50px; bottom: 70px; <?php echo date('Y/m/d') == '2023/12/23' ? 'display:none;' : ''; ?>">
    <div class=" col-12 col-sm-9  timer mx-auto mt-0 text-center countdown-container" id="test" style="border-radius: 25px 5px 30px 5px; ">
      <div class="div1">
        <p id="days" class="big-text">0</p>
        <span class="fs-6 fw-bold">Days</span>
      </div>
      <div>
        <p class="big">:</p>
      </div>
      <div class="div1">
        <p id="hours" class="big-text">0</p>
        <span class="fs-6 fw-bold">Hours</span>
      </div>
      <div class="hide">
        <p class="big">:</p>
      </div>
      <div class="div1">
        <p id="mins" class="big-text">0</p>
        <span class="fs-6 fw-bold mb-1">Minutes</span>
      </div>
      <div>
        <p class="big">:</p>
      </div>
      <div class="div1">
        <p id="secs" class="big-text">0</p>
        <span class="fs-6 fw-bold">Seconds</span>
      </div>
    </div>
  </div>

</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
  const navbar = document.querySelector(".navbar");
  const navbarToggle = navbar.querySelector("#navbar-toggle");
  const navbarMenu = document.querySelector("#navbar-menu");
  const navbarLinksContainer = navbarMenu.querySelector(".navbar-links");
  let isNavbarExpanded = navbarToggle.getAttribute("aria-expanded") === "true";

  const toggleNavbarVisibility = () => {
    isNavbarExpanded = !isNavbarExpanded;
    navbarToggle.setAttribute("aria-expanded", isNavbarExpanded);
  };

  navbarToggle.addEventListener("click", toggleNavbarVisibility);

  navbarLinksContainer.addEventListener("click", (e) => e.stopPropagation());
  navbarMenu.addEventListener("click", toggleNavbarVisibility);

  //////////////////////////////

  document.addEventListener("DOMContentLoaded", function() {
    const dateElements = document.querySelectorAll("#date");

    dateElements.forEach(function(dateElement, index) {
      setTimeout(function() {
        dateElement.classList.add("show");
      }, index * 500); // Adjust the delay (in milliseconds) between each date element
    });
  });

  //count down
  //countdown start
  let daysItem = document.querySelector("#days");
  let hoursItem = document.querySelector("#hours");
  let minsItem = document.querySelector("#mins");
  let secsItem = document.querySelector("#secs");

  let countDown = () => {
    let targetDate = new Date("15 Dec 2023");
    let currentDate = new Date();
    let difference = targetDate - currentDate;
    // console.log(difference);

    let days = Math.floor(difference / (1000 * 60 * 60 * 24));
    let hours = Math.floor(difference / (1000 * 60 * 60)) % 24;
    let mins = Math.floor(difference / (1000 * 60)) % 60;
    let secs = Math.floor(difference / (1000)) % 60;

    daysItem.innerHTML = days;
    hoursItem.innerHTML = hours;
    minsItem.innerHTML = mins;
    secsItem.innerHTML = secs;
  }

  countDown();

  setInterval(countDown, 1000);
</script>