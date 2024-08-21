function toggleNav()
{
    let nav = document.getElementById("nav-links");
    if (nav.style.display == "block")
    {
        nav.style.display = "none";
    }
    else
    {
        nav.style.display = "block";
    }
}

function openNavSubmenu(submenu)
{
    return;
    if (window.innerHeight / window.innerWidth > 1.0)
    {
        if (submenu.id == "toggled-nav")
        {
            setTimeout(10, closeNavSubmenu(submenu));
            return;
        }
        let current = document.getElementById("toggled-nav");
        if (current)
        {
            current.id = "";
        }
        submenu.id = "toggled-nav";
    }
}

function closeNavSubmenu(submenu)
{
    submenu.id = "";
}
