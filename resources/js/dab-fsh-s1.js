document.addEventListener('DOMContentLoaded', (event) => {
    postBody = document.getElementById('about-body-display');
    anchors = postBody.getElementsByTagName("a");
    for (let anchor of anchors)
    {
        anchor.classList.add('underline');
        anchor.classList.add('font-semibold');
        anchor.classList.add('hover:text-copy-secondary');
    }
    h1s = postBody.getElementsByTagName("h1");
    for (let h1 of h1s)
    {
        h1.classList.add('text-6xl');
    }
    h2s = postBody.getElementsByTagName("h2");
    for (let h2 of h2s)
    {
        h2.classList.add('text-5xl');
    }
    h3s = postBody.getElementsByTagName("h3");
    for (let h3 of h3s)
    {
        h3.classList.add('text-4xl');
    }
    ols = postBody.getElementsByTagName("ol");
    for (let ol of ols)
    {
        ol.classList.add("list-decimal", "ml-4", "mb-4");
    }
    uls = postBody.getElementsByTagName("ul");
    for (let ul of uls)
    {
        ul.classList.add("list-disc", "ml-4", "mb-4");
    }
    ps = postBody.getElementsByTagName("p");
    for (let p of ps)
    {
        p.classList.add('mb-4');
    }
});