import "./modules/sidebar-mobile"
import "./modules/Search"
import "./modules/template-pages"
import "./modules/links"
import "./modules/openAi"


// GLOBAL
    document.querySelectorAll('input').forEach(input => {
        input.setAttribute('autocomplete', 'off');
        input.setAttribute('readonly', 'true');

        input.addEventListener("focus", (e) => {
            e.target.removeAttribute('readonly');
        })
        input.addEventListener("blur", (e) => {
            e.target.setAttribute('readonly', 'true');
        })
    });