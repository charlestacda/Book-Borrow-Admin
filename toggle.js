// Add this script after the HTML content
document.addEventListener("DOMContentLoaded", function() {
    // Get the toggle switch element
    const toggleSwitch = document.getElementById("toggleSwitch");
  
    // Get the table elements
    const dataTableDecline = document.getElementById("dataTableApprove");
    const dataTableApprove = document.getElementById("dataTableDecline");
  
    // Function to show the "Approve" table and hide the "Decline" table
    function showApproveTable() {
      dataTableDecline.style.display = "none";
      dataTableApprove.style.display = "table";
    }
  
    // Function to show the "Decline" table and hide the "Approve" table
    function showDeclineTable() {
      dataTableApprove.style.display = "none";
      dataTableDecline.style.display = "table";
    }
  
    // Add an event listener to the toggle switch
    toggleSwitch.addEventListener("change", function() {
      // If the toggle switch is checked (On), show the "Approve" table; otherwise, show the "Decline" table
      if (toggleSwitch.checked) {
        showApproveTable();
      } else {
        showDeclineTable();
      }
    });
  
    // Trigger the event once on page load to apply the initial state
    toggleSwitch.dispatchEvent(new Event("change"));
  });
  