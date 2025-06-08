// Confirm deletion action
function confirmDeletion(event) {
    if (!confirm("Are you sure you want to delete this item?")) {
        event.preventDefault();
    }
}

// Attach confirm deletion events to delete buttons
document.querySelectorAll('.delete-button').forEach(button => {
    button.addEventListener('click', confirmDeletion);
});