// Smart Campus Complaint and Management System JS

// Mobile navbar toggle
const menuIcon = document.getElementById("menuIcon");
const navLinks = document.getElementById("navLinks");
if (menuIcon && navLinks) {
    menuIcon.addEventListener("click", function () {
        navLinks.classList.toggle("show");
    });
}

function showError(input, message) {
    const inputGroup = input.parentElement;
    const errorMessage = inputGroup.querySelector(".error-message");
    if (errorMessage) errorMessage.innerText = message;
}

function clearErrors(form) {
    form.querySelectorAll(".error-message").forEach(function (error) {
        error.innerText = "";
    });
}

function validateRequired(form, fields) {
    let isValid = true;
    clearErrors(form);
    fields.forEach(function (item) {
        const el = document.getElementById(item.id);
        if (el && el.value.trim() === "") {
            showError(el, item.message);
            isValid = false;
        }
    });
    return isValid;
}

const loginForm = document.getElementById("loginForm");
if (loginForm) {
    loginForm.addEventListener("submit", function (event) {
        const valid = validateRequired(loginForm, [
            { id: "email", message: "Email is required" },
            { id: "password", message: "Password is required" },
            { id: "role", message: "Please select your role" }
        ]);
        if (!valid) event.preventDefault();
    });
}

const registerForm = document.getElementById("registerForm");
if (registerForm) {
    registerForm.addEventListener("submit", function (event) {
        let isValid = validateRequired(registerForm, [
            { id: "fullName", message: "Full name is required" },
            { id: "regEmail", message: "Email is required" },
            { id: "regPassword", message: "Password is required" },
            { id: "department", message: "Department is required" },
            { id: "semester", message: "Please select semester" }
        ]);
        const password = document.getElementById("regPassword");
        if (password && password.value.trim() !== "" && password.value.length < 6) {
            showError(password, "Password must be at least 6 characters");
            isValid = false;
        }
        if (!isValid) event.preventDefault();
    });
}

const complaintForm = document.getElementById("complaintForm");
if (complaintForm) {
    complaintForm.addEventListener("submit", function (event) {
        const valid = validateRequired(complaintForm, [
            { id: "complaintTitle", message: "Complaint title is required" },
            { id: "category", message: "Please select complaint category" },
            { id: "priority", message: "Please select complaint priority" },
            { id: "location", message: "Location is required" },
            { id: "description", message: "Description is required" }
        ]);
        if (!valid) event.preventDefault();
    });
}

const staffForm = document.getElementById("staffForm");
if (staffForm) {
    staffForm.addEventListener("submit", function (event) {
        let isValid = validateRequired(staffForm, [
            { id: "staffName", message: "Staff name is required" },
            { id: "staffEmail", message: "Staff email is required" },
            { id: "staffDepartment", message: "Please select staff department" },
            { id: "staffPassword", message: "Password is required" }
        ]);
        const password = document.getElementById("staffPassword");
        if (password && password.value.trim() !== "" && password.value.length < 6) {
            showError(password, "Password must be at least 6 characters");
            isValid = false;
        }
        if (!isValid) event.preventDefault();
    });
}

function tableSearch(inputId, tableId) {
    const input = document.getElementById(inputId);
    const table = document.getElementById(tableId);
    if (input && table) {
        input.addEventListener("keyup", function () {
            const searchValue = input.value.toLowerCase();
            table.querySelectorAll("tbody tr").forEach(function (row) {
                row.style.display = row.innerText.toLowerCase().includes(searchValue) ? "" : "none";
            });
        });
    }
}

tableSearch("searchComplaint", "complaintsTable");
tableSearch("searchUser", "usersTable");
tableSearch("searchStaff", "staffTable");
tableSearch("searchAssignedComplaint", "assignedComplaintsTable");

const statusFilter = document.getElementById("statusFilter");
const categoryFilter = document.getElementById("categoryFilter");
const complaintsTable = document.getElementById("complaintsTable");
if (statusFilter && categoryFilter && complaintsTable) {
    function filterComplaints() {
        const statusValue = statusFilter.value.toLowerCase();
        const categoryValue = categoryFilter.value.toLowerCase();
        const rows = complaintsTable.querySelectorAll("tbody tr");
        rows.forEach(function (row) {
            const rowText = row.innerText.toLowerCase();
            const statusMatch = statusValue === "" || rowText.includes(statusValue);
            const categoryMatch = categoryValue === "" || rowText.includes(categoryValue);
            row.style.display = (statusMatch && categoryMatch) ? "" : "none";
        });
    }
    statusFilter.addEventListener("change", filterComplaints);
    categoryFilter.addEventListener("change", filterComplaints);
}

const logoutLinks = document.querySelectorAll(".logout-link");
logoutLinks.forEach(function (link) {
    link.addEventListener("click", function (event) {
        if (!confirm("Are you sure you want to logout?")) event.preventDefault();
    });
});
