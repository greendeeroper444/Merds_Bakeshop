function toggleDropdownMenuDrop() {
    var dropdownMenu = document.querySelector('.dropdown-menu-drop ul');
    dropdownMenu.style.display = (dropdownMenu.style.display === 'block') ? 'none' : 'block';
  }

$(document).ready(function(){
    $(".nav-link").click(function() {
        $(".nav-link").removeClass("active");
        $(this).addClass("active");
    });

    var currentUrl = window.location.href;
    $(".nav-link").each(function() {
        if (currentUrl.includes($(this).attr("href"))) {
            $(this).addClass("active");
            return false;
        }
    });
});
