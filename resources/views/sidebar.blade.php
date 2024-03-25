<div class="sidebar">
    <ul>
        <!-- Home -->
        <li>
            <a href="{{ route('dashboard') }}">
                <i class="pi pi-fw pi-home layout-menuitem-icon"></i>
            </a>
        </li>
        <!-- Student Details -->
        <li>
            <a href="#" onclick="toggleSubMenu('student-details-submenu')">
                <i class="pi pi-fw pi-book layout-menuitem-icon"></i>
                التسجيل وبيانات الطالب
            </a>
            <!-- Submenu for Student Details -->
            <div id="student-details-submenu" class="submenu">
                <a href="#"> حجز الوقت الحر وموعد التسجيل <i class="pi pi-fw pi-calendar layout-menuitem-icon"></i></a>
                <a href="#"> تسجيل المواد <i class="pi pi-fw pi-table layout-menuitem-icon"></i> </a>
                <a href="#"> إلغاء طلبات فتح الشعب <i class="pi pi-fw pi-times layout-menuitem-icon"></i></a>
                <a href="#">الانسحاب بدون ترصيد <i class="pi pi-fw pi-minus layout-menuitem-icon"></i> </a>
                <a href="#">العبئ الدراسي الألي <i class="pi pi-fw pi-file layout-menuitem-icon"></i> </a>
                <a href="#"> تثبيت الدفع للطلبة المبتعثين <i class="pi pi-fw pi-money-bill layout-menuitem-icon"></i></a>
                <a href="{{ route('details.show') }}"> بيانات الطالب الشخصية <i class="pi pi-fw pi-phone layout-menuitem-icon"></i></a>
            </div>
        </li>
        <!-- Electronic Orders -->
        <li>
            <a href="#" onclick="toggleSubMenu('electronic-orders-submenu')">
                <i class="pi pi-fw pi-envelope layout-menuitem-icon"></i>
                الطلبات اﻹلكترونية
            </a>
            <!-- Submenu for Electronic Orders -->
            <div id="electronic-orders-submenu" class="submenu">
                <a href="#">تقديم طلب انتقال <i class="pi pi-fw pi-sync layout-menuitem-icon"></i> </a>
                <a href="#">اسأل المرشد <i class="pi pi-fw pi-question layout-menuitem-icon"></i> </a>
                <a href="#"> نموذج اعتماد مكان التدريب <i class="pi pi-fw pi-file-o layout-menuitem-icon"></i></a>
                <a href="#"> براءة الذمة للطلبة <i class="pi pi-fw pi-check layout-menuitem-icon"></i></a>
            </div>
        </li>
        <!-- Specifications -->
        <li>
            <a href="#" onclick="toggleSubMenu('specifications-submenu')">
                <i class="pi pi-fw pi-search layout-menuitem-icon"></i>
                اﻹستفسارات
            </a>
            <!-- Submenu for Specifications -->
            <div id="specifications-submenu" class="submenu">
                <a href="#">طباعة الجدول والقسيمة <i class="pi pi-fw pi-print layout-menuitem-icon"></i> </a>
                <a href="#">نتائج منتسف الفصل <i class="pi pi-fw pi-percentage layout-menuitem-icon"></i> </a>
                <a href="#"> نتائج الطالب النهائية <i class="pi pi-fw pi-chart-bar layout-menuitem-icon"></i></a>
                <a href="#"> الجدول الدراسي <i class="pi pi-fw pi-table layout-menuitem-icon"></i></a>
                <a href="#">اﻹستفسار عن المواد المطروحة <i class="pi pi-fw pi-search layout-menuitem-icon"></i> </a>
                <a href="#">الخطة الدراسية <i class="pi pi-fw pi-list layout-menuitem-icon"></i> </a>
                <a href="#"> التخصصات المسموح اﻹنتقال لها <i class="pi pi-fw pi-sync layout-menuitem-icon"></i></a>
            </div>
        </li>
    </ul>
</div>


<script>
    document.addEventListener('click', function(event) {
        var sidebar = document.querySelector('.sidebar');
        var allSubmenus = document.querySelectorAll('.submenu');

        // Check if the clicked element is outside the sidebar and not a submenu
        if (!sidebar.contains(event.target) && !event.target.classList.contains('submenu')) {
            // Hide all submenus
            allSubmenus.forEach(function(submenu) {
                submenu.classList.remove('active');
            });
        }
    });

    function toggleSubMenu(submenuId) {
        var submenu = document.getElementById(submenuId);

        // Hide all other submenus
        var allSubmenus = document.querySelectorAll('.submenu');
        allSubmenus.forEach(function(submenu) {
            submenu.classList.remove('active');
        });

        // Toggle the display of the clicked submenu
        submenu.classList.toggle('active');
    }
    function toggleSidebar() {
        var sidebar = document.querySelector('.sidebar');
        sidebar.classList.toggle('active');
    }
</script>


</body>
</html>
