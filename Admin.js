var sidebarOpen=false;
var sidebar=document.getElementById("sidebar");

function openbar(){
    if(!sidebarOpen){
        sidebar.classList.add("sidebar-responsive");
        sidebarOpen=true;
    }
}

function closeSidebar(){
    if(sidebarOpen){
        sidebar.classList.remove("sidebar-responsive");
        sidebarOpen=false;
    }
}