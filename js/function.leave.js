$(document).ready(function () {
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const leaveSelect = document.getElementById("typeLeaveSelect");
    const vacationLeaveDiv = document.getElementById("VacationLeave");
    const sickLeaveDiv = document.getElementById("SickLeave");
    const specialLeaveDiv = document.getElementById("SpecialLeave");
    const studyLeaveDiv = document.getElementById("StudyLeave");
    const othersDiv = document.getElementById("Others");

    // Function to hide all divs
    function hideAllDivs() {
        vacationLeaveDiv.style.display = "none";
        sickLeaveDiv.style.display = "none";
        specialLeaveDiv.style.display = "none";
        studyLeaveDiv.style.display = "none";
        othersDiv.style.display = "none";
    }

    // Function to show the relevant div based on selection
    function showSelectedLeave() {
        hideAllDivs(); // Hide all first
        let selectedValue = leaveSelect.value;

        // If blank, default to "Vacation Leave"
        if (selectedValue === "") {
            leaveSelect.value = "Vacation Leave";
            selectedValue = "Vacation Leave";
        }

        if (selectedValue === "Vacation Leave" || selectedValue === "Special Privilege Leave") {
            vacationLeaveDiv.style.display = "block";
        } else if (selectedValue === "Sick Leave") {
            sickLeaveDiv.style.display = "block";
        } else if (selectedValue === "Special Leave Benefits for Women") {
            specialLeaveDiv.style.display = "block";
        } else if (selectedValue === "Study Leave") {
            studyLeaveDiv.style.display = "block";
        } else if (selectedValue === "Others") {
            othersDiv.style.display = "block";
        }
    }

    // Initialize selection on page load
    showSelectedLeave();

    // Listen for changes in the dropdown
    leaveSelect.addEventListener("change", showSelectedLeave);
});

$(function() {
    let selectedDates = [];

    $("#calendar").datepicker({
        dateFormat: "yy-mm-dd",
        numberOfMonths: 1,
        minDate: 0, // Disable past dates
        beforeShowDay: function(date) {
            let day = date.getDay(); // 0 = Sunday, 6 = Saturday
            let dateString = $.datepicker.formatDate('yy-mm-dd', date);
            let isSelected = selectedDates.includes(dateString);
            let today = new Date();
            today.setHours(0, 0, 0, 0);

            if (day === 0 || day === 6 || date < today) { 
                // Disable weekends and past dates
                return [false, "ui-state-disabled"];
            }

            return [true, isSelected ? "ui-state-highlight" : ""];
        },
        onSelect: function(dateText) {
            let index = selectedDates.indexOf(dateText);
            if (index === -1) {
                selectedDates.push(dateText);
            } else {
                selectedDates.splice(index, 1);
            }
            updateSelectedDates();
            $(this).datepicker("refresh");
        }
    });

    function updateSelectedDates() {
        let formattedDates = selectedDates.map(date => {
            let d = new Date(date);
            return d.toLocaleString('en-US', { month: 'long', day: 'numeric', year: 'numeric' });
        });

        $("#days_count").text(selectedDates.length);
        $("#dates_count").text(formattedDates.length ? formatDates(formattedDates) : "None");

        $("#num_days").val(selectedDates.length);
        $("#inclusive_dates").val(formattedDates.length ? formatDates(formattedDates) : "None");

    }

    function formatDates(dates) {
        if (dates.length === 0) return "";

        let grouped = dates.reduce((acc, curr, i, arr) => {
            let currDate = new Date(curr);
            let prevDate = i > 0 ? new Date(arr[i - 1]) : null;

            // Ensure we don't mix months
            if (
                prevDate &&
                (currDate - prevDate) / (1000 * 60 * 60 * 24) === 1 &&
                currDate.getMonth() === prevDate.getMonth()
            ) {
                acc[acc.length - 1].push(curr);
            } else {
                acc.push([curr]);
            }
            return acc;
        }, []);

        let monthGroups = {};

        grouped.forEach(group => {
            let firstDate = new Date(group[0]);
            let lastDate = new Date(group[group.length - 1]);
            let month = firstDate.toLocaleString('default', { month: 'long' });

            let range = firstDate.getDate() === lastDate.getDate()
                ? `${firstDate.getDate()}`
                : `${firstDate.getDate()}–${lastDate.getDate()}`;

            if (!monthGroups[month]) {
                monthGroups[month] = [];
            }
            monthGroups[month].push(range);
        });

        let formattedDates = Object.entries(monthGroups)
            .map(([month, ranges]) => `${month} ${ranges.join(', ')}`)
            .join(', ');

        let lastDate = new Date(dates[dates.length - 1]);
        let year = lastDate.getFullYear();

        return `${formattedDates}, ${year}`;
    }

});