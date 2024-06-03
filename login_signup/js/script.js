const sidebarToggle = document.querySelector("#sidebar-toggle");
sidebarToggle.addEventListener("click",function(){
    document.querySelector("#sidebar").classList.toggle("collapsed");
});

function updateClock() {
    const now = new Date();
    const year = now.getFullYear();
    const month = now.toLocaleString('default', { month: 'long' });
    const day = now.getDate();
    const hours = now.getHours().toString().padStart(2, '0');
    const minutes = now.getMinutes().toString().padStart(2, '0');
    const seconds = now.getSeconds().toString().padStart(2, '0');

    const dateStr = `${month} ${day} ${year}`;
    const timeStr = `${hours}:${minutes}:${seconds}`;

    document.getElementById('date').innerText = dateStr;
    document.getElementById('time').innerText = timeStr;
}

setInterval(updateClock, 1000);
updateClock();  // initial call to display time immediately on load




