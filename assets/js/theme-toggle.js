document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("theme-toggle");

    if (!toggleButton) return;

    const themeIcon = toggleButton.querySelector(".theme-icon");
    const themeLabel = toggleButton.querySelector(".theme-label");

    // Restore the saved theme; default to light mode.
    let savedTheme = "light";

    try {
        savedTheme = localStorage.getItem("portfolio-theme") || "light";
    } catch (error) {
        // Continue without saved preferences if storage is unavailable.
    }

    function applyTheme(theme) {
        const isDark = theme === "dark";

        document.documentElement.setAttribute("data-theme", theme);

        // Update the button to show the next available theme.
        themeIcon.textContent = isDark ? "☀" : "☾";
        themeLabel.textContent = isDark ? "Light mode" : "Dark mode";

        toggleButton.setAttribute(
            "aria-label",
            isDark ? "Switch to light mode" : "Switch to dark mode"
        );

        toggleButton.setAttribute("aria-pressed", String(isDark));

        try {
            localStorage.setItem("portfolio-theme", theme);
        } catch (error) {
            // Theme switching still works for the current page.
        }
    }

    // Apply the saved preference on page load.
    applyTheme(savedTheme);

    // Toggle between light and dark.
    toggleButton.addEventListener("click", function () {
        const currentTheme =
            document.documentElement.getAttribute("data-theme") || "light";

        applyTheme(currentTheme === "dark" ? "light" : "dark");
    });
});
