function changeEventHandler(event) {
    if (event.target.tagName === "LI") {
        const parentElement = this.parentNode;
        this.value = event.target.textContent;
        const ulElement = parentElement.querySelector('ul.dropdown-menu');
        ulElement.style.display = "none";
        const syntheticEvent = new Event('change');
        this.dispatchEvent(syntheticEvent);
        console.log("Added Change Synthetic Event");
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const inputs = document.querySelectorAll('input.dropdown');

    inputs.forEach(input => {
        const parentElement = input.parentNode;
        const ulElement = parentElement.querySelector('ul.dropdown-menu');
        const boundChangeEventHandler = changeEventHandler.bind(input);

        input.addEventListener("click", function (event) {
            event.stopPropagation();
            ulElement.style.display = ulElement.style.display === "block" ? "none" : "block";
        });

        ulElement.addEventListener("click", boundChangeEventHandler);

        document.addEventListener("click", function (event) {
            if (!parentElement.contains(event.target)) {
                ulElement.style.display = "none";
            }
        });
    });
});
