// Cancel ticket action
function cancelTicket() {
    if (confirm("Möchten Sie das Ticket wirklich abbrechen?")) {
        document.getElementById('ticketForm').reset();
    }
}
