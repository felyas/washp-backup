const addForm = document.getElementById("addCustomerForm");
const updateStatus = document.getElementById("editStatusForm");
const viewSummary = document.getElementById("viewSummary");

// Fetch all items Ajax request
const fetchItems = async () => {
  const data = await fetch(`./action/booking_action.php?read=1`, {
    method: "GET",
  });
  const response = await data.text(); //
  tbody.innerHTML = response;
};
fetchItems();

//Edit, View, Delete Target
tbody.addEventListener("click", (e) => {
  if (e.target && e.target.matches("a.editLink")) {
    e.preventDefault();
    let id = e.target.getAttribute("id");
    editStatus(id);
  } else if (e.target && e.target.matches("a.viewLink")) {
    e.preventDefault();
    let id = e.target.getAttribute("id");
    viewBooking(id);
  } else if (e.target && e.target.matches("a.deleteLink")) {
    e.preventDefault();
    let id = e.target.getAttribute("id");
    deleteBooking(id);
  }
});



//Get update data
const editStatus = async (id) => {
  const data = await fetch(`./action/booking_action.php?edit=1&id=${id}`, {
    method: "GET",
  });
  const response = await data.json();
  // console.log(response);
  document.getElementById("id").value = response.booking_id;
  document.getElementById("lname").value = response.lname;
  document.getElementById("selectedService").value = response.status;
};

updateStatus.addEventListener("submit", async (e) => {
  e.preventDefault();

  const formData = new FormData(updateStatus);
  formData.append("update", 1);

  // Bootstrap method for checking validation
  if (updateStatus.checkValidity() === false) {
    e.preventDefault();
    e.stopPropagation();
    updateStatus.classList.add("was-validated");
    return false;
  } else {
    document.getElementById("edit-status-btn").value = "Updating...";

    const data = await fetch(`./action/booking_action.php`, {
      method: "POST",
      body: formData,
    });

    //handle response from the server
    const response = await data.text();
    showAlert.innerHTML = response;
    document.getElementById("edit-status-btn").value = "Save";
    updateStatus.reset();
    updateStatus.classList.remove("was-validated");
    fetchItems();
  }
});

//View Order Preview
const OrderPreview = async (id) => {
  const data = await fetch(`./action/booking_action.php?edit=1&id=${id}`, {
    method: "GET",
  });
  const response = await data.json();
  // console.log(response);
  document.getElementById("id").value = response.booking_id;
  document.getElementById("lname").value = response.lname;
  document.getElementById("selectedService").value = response.status;
};

// View All data in booking for Order Summary
const viewBooking = async (id) => {
  // window.location.href = `Aorder_summary.php?id=${id}`;
  const data = await fetch(`./action/booking_action.php?edit=1&id=${id}`, { //Done on recorrect the page name
    method: "GET",
  });
  const response = await data.json();
  
  document.getElementById("firstname").innerText = response.fname;
  document.getElementById("lastname").innerText = response.lname;
  document.getElementById("phone_number").innerText = response.phone;
  document.getElementById("email_address").innerText = response.email;
  document.getElementById("address").innerText = response.address;
  document.getElementById("landmarks").innerText = response.detail_address;
  document.getElementById("shipping_method").innerText = response.shipping_method;
  document.getElementById("payment_method").innerText = response.payment_method;
};