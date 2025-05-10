<!-- Doctor Schedule Modal -->
<div class="modal-backdrop" id="schedule-modal">
    <div class="modal">
        <div class="modal-header">
            <h3 class="modal-title">Edit Doctor Schedule</h3>
            <button class="modal-close" id="close-schedule-modal">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="schedule-form">
                <div class="form-group">
                    <label class="form-label" for="doctor-name">Doctor Name</label>
                    <input type="text" class="form-control" id="doctor-name" value="Dr. Sarah Johnson" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label" for="doctor-specialty">Specialty</label>
                    <input type="text" class="form-control" id="doctor-specialty" value="General Veterinarian"
                        readonly>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label" for="schedule-days">Working Days</label>
                        <select class="form-select" id="schedule-days" multiple>
                            <option value="monday" selected>Monday</option>
                            <option value="tuesday">Tuesday</option>
                            <option value="wednesday" selected>Wednesday</option>
                            <option value="thursday">Thursday</option>
                            <option value="friday" selected>Friday</option>
                            <option value="saturday">Saturday</option>
                            <option value="sunday">Sunday</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="schedule-status">Status</label>
                        <select class="form-select" id="schedule-status">
                            <option value="active" selected>Active</option>
                            <option value="off-duty">Off Duty</option>
                            <option value="vacation">On Vacation</option>
                            <option value="sick-leave">Sick Leave</option>
                        </select>
                    </div>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label" for="schedule-start">Start Time</label>
                        <input type="time" class="form-control" id="schedule-start" value="09:00">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="schedule-end">End Time</label>
                        <input type="time" class="form-control" id="schedule-end" value="17:00">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="schedule-notes">Notes</label>
                    <textarea class="form-control" id="schedule-notes" rows="3"></textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" id="cancel-schedule">Cancel</button>
            <button class="btn btn-primary" id="save-schedule">Save Changes</button>
        </div>
    </div>
</div>

<!-- Add Doctor Modal -->
<div class="modal-backdrop" id="">
    <div class="modal">
        <div class="modal-header">
            <h3 class="modal-title">Add New Doctor</h3>
            <button class="modal-close" id="close-add-doctor-modal">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="add-doctor-form">
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label" for="new-doctor-first-name">First Name</label>
                        <input type="text" class="form-control" id="new-doctor-first-name"
                            placeholder="Enter first name">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="new-doctor-last-name">Last Name</label>
                        <input type="text" class="form-control" id="new-doctor-last-name"
                            placeholder="Enter last name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="new-doctor-email">Email</label>
                    <input type="email" class="form-control" id="new-doctor-email"
                        placeholder="Enter email address">
                </div>
                <div class="form-group">
                    <label class="form-label" for="new-doctor-specialty">Specialty</label>
                    <select class="form-select" id="new-doctor-specialty">
                        <option value="">Select specialty</option>
                        <option value="general">General Veterinarian</option>
                        <option value="surgical">Surgical Specialist</option>
                        <option value="feline">Feline Specialist</option>
                        <option value="canine">Canine Specialist</option>
                        <option value="dermatology">Dermatology Specialist</option>
                        <option value="exotic">Exotic Pet Specialist</option>
                    </select>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label" for="new-doctor-days">Working Days</label>
                        <select class="form-select" id="new-doctor-days" multiple>
                            <option value="monday">Monday</option>
                            <option value="tuesday">Tuesday</option>
                            <option value="wednesday">Wednesday</option>
                            <option value="thursday">Thursday</option>
                            <option value="friday">Friday</option>
                            <option value="saturday">Saturday</option>
                            <option value="sunday">Sunday</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="new-doctor-status">Status</label>
                        <select class="form-select" id="new-doctor-status">
                            <option value="active" selected>Active</option>
                            <option value="off-duty">Off Duty</option>
                        </select>
                    </div>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label" for="new-doctor-start">Start Time</label>
                        <input type="time" class="form-control" id="new-doctor-start" value="09:00">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="new-doctor-end">End Time</label>
                        <input type="time" class="form-control" id="new-doctor-end" value="17:00">
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" id="cancel-add-doctor">Cancel</button>
            <button class="btn btn-primary" id="save-add-doctor">Add Doctor</button>
        </div>
    </div>
</div>

<!-- Add Appointment Modal -->
<div class="modal-backdrop" id="add-appointment-modal">
    <div class="modal">
        <div class="modal-header">
            <h3 class="modal-title">Add New Appointment</h3>
            <button class="modal-close" id="close-add-appointment-modal">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="add-appointment-form">
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label" for="owner-name">Pet Owner Name</label>
                        <input type="text" class="form-control" id="owner-name" placeholder="Enter owner name">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="owner-phone">Phone Number</label>
                        <input type="tel" class="form-control" id="owner-phone"
                            placeholder="Enter phone number">
                    </div>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label" for="pet-name">Pet Name</label>
                        <input type="text" class="form-control" id="pet-name" placeholder="Enter pet name">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="pet-type">Pet Type</label>
                        <select class="form-select" id="pet-type">
                            <option value="">Select pet type</option>
                            <option value="dog">Dog</option>
                            <option value="cat">Cat</option>
                            <option value="bird">Bird</option>
                            <option value="reptile">Reptile</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label" for="appointment-service">Service</label>
                        <select class="form-select" id="appointment-service">
                            <option value="">Select service</option>
                            <option value="checkup">General Checkup</option>
                            <option value="vaccination">Vaccination</option>
                            <option value="dental">Dental Care</option>
                            <option value="surgery">Surgery</option>
                            <option value="grooming">Grooming</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="appointment-doctor">Doctor</label>
                        <select class="form-select" id="appointment-doctor">
                            <option value="">Select doctor</option>
                            <option value="dr-johnson">Dr. Sarah Johnson</option>
                            <option value="dr-chen">Dr. Michael Chen</option>
                            <option value="dr-rodriguez">Dr. Emily Rodriguez</option>
                            <option value="dr-taylor">Dr. Robert Taylor</option>
                            <option value="dr-wilson">Dr. James Wilson</option>
                            <option value="dr-patel">Dr. Lisa Patel</option>
                        </select>
                    </div>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label" for="appointment-date">Date</label>
                        <input type="date" class="form-control" id="appointment-date">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="appointment-time">Time</label>
                        <input type="time" class="form-control" id="appointment-time">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="appointment-notes">Notes</label>
                    <textarea class="form-control" id="appointment-notes" rows="3" placeholder="Enter any additional notes"></textarea>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Doctor Schedules Page -->
<div class="page" id="doctor-schedules">
    <h2 class="page-title">Doctor Schedules</h2>

    <div class="table-container">
        <div class="table-header">
            <h3 class="table-title">All Doctors</h3>
            <div class="table-actions">
                <div class="table-search">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search doctors...">
                </div>
                <button class="table-button" id="add-doctor-btn">
                    <i class="fas fa-plus"></i>
                    <span>Add Doctor</span>
                </button>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Doctor</th>
                    <th>Specialty</th>
                    <th>Schedule</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="table-user">
                            <div class="table-avatar">SJ</div>
                            <div class="table-user-info">
                                <div class="table-user-name">Dr. Sarah Johnson</div>
                                <div class="table-user-email">sarah.j@vetclinic.com</div>
                            </div>
                        </div>
                    </td>
                    <td>General Veterinarian</td>
                    <td>Mon, Wed, Fri: 9AM - 5PM</td>
                    <td><span class="table-badge green">Active</span></td>
                    <td>
                        <div class="table-actions-cell">
                            <button class="table-action-button edit-schedule-btn" data-id="1">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="table-action-button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="table-user">
                            <div class="table-avatar">MC</div>
                            <div class="table-user-info">
                                <div class="table-user-name">Dr. Michael Chen</div>
                                <div class="table-user-email">michael.c@vetclinic.com</div>
                            </div>
                        </div>
                    </td>
                    <td>Surgical Specialist</td>
                    <td>Mon, Thu: 10AM - 6PM</td>
                    <td><span class="table-badge green">Active</span></td>
                    <td>
                        <div class="table-actions-cell">
                            <button class="table-action-button edit-schedule-btn" data-id="2">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="table-action-button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="table-user">
                            <div class="table-avatar">ER</div>
                            <div class="table-user-info">
                                <div class="table-user-name">Dr. Emily Rodriguez</div>
                                <div class="table-user-email">emily.r@vetclinic.com</div>
                            </div>
                        </div>
                    </td>
                    <td>Feline Specialist</td>
                    <td>Tue, Sat: 9AM - 2PM</td>
                    <td><span class="table-badge green">Active</span></td>
                    <td>
                        <div class="table-actions-cell">
                            <button class="table-action-button edit-schedule-btn" data-id="3">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="table-action-button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="table-user">
                            <div class="table-avatar">RT</div>
                            <div class="table-user-info">
                                <div class="table-user-name">Dr. Robert Taylor</div>
                                <div class="table-user-email">robert.t@vetclinic.com</div>
                            </div>
                        </div>
                    </td>
                    <td>Canine Specialist</td>
                    <td>Wed, Sat: 9AM - 2PM</td>
                    <td><span class="table-badge red">Off Duty</span></td>
                    <td>
                        <div class="table-actions-cell">
                            <button class="table-action-button edit-schedule-btn" data-id="4">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="table-action-button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="table-user">
                            <div class="table-avatar">JW</div>
                            <div class="table-user-info">
                                <div class="table-user-name">Dr. James Wilson</div>
                                <div class="table-user-email">james.w@vetclinic.com</div>
                            </div>
                        </div>
                    </td>
                    <td>Dermatology Specialist</td>
                    <td>Tue, Fri: 10AM - 6PM</td>
                    <td><span class="table-badge green">Active</span></td>
                    <td>
                        <div class="table-actions-cell">
                            <button class="table-action-button edit-schedule-btn" data-id="5">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="table-action-button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="table-user">
                            <div class="table-avatar">LP</div>
                            <div class="table-user-info">
                                <div class="table-user-name">Dr. Lisa Patel</div>
                                <div class="table-user-email">lisa.p@vetclinic.com</div>
                            </div>
                        </div>
                    </td>
                    <td>Exotic Pet Specialist</td>
                    <td>Thu: 10AM - 6PM</td>
                    <td><span class="table-badge green">Active</span></td>
                    <td>
                        <div class="table-actions-cell">
                            <button class="table-action-button edit-schedule-btn" data-id="6">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="table-action-button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="table-pagination">
            <div class="table-pagination-info">
                Showing 1 to 6 of 6 entries
            </div>
            <div class="table-pagination-buttons">
                <button class="table-pagination-button">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="table-pagination-button active">1</button>
                <button class="table-pagination-button">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Appointments Page -->
<div class="page" id="appointments">
    <h2 class="page-title">Appointments</h2>

    <div class="table-container">
        <div class="table-header">
            <h3 class="table-title">All Appointments</h3>
            <div class="table-actions">
                <div class="table-search">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search appointments...">
                </div>
                <button class="table-button" id="add-appointment-btn">
                    <i class="fas fa-plus"></i>
                    <span>Add Appointment</span>
                </button>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Pet Owner</th>
                    <th>Pet</th>
                    <th>Service</th>
                    <th>Doctor</th>
                    <th>Date & Time</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>John Smith</td>
                    <td>Max (Golden Retriever)</td>
                    <td>Vaccination</td>
                    <td>Dr. Sarah Johnson</td>
                    <td>Today, 9:00 AM</td>
                    <td><span class="table-badge blue">Confirmed</span></td>
                    <td>
                        <div class="table-actions-cell">
                            <button class="table-action-button">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="table-action-button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Emma Davis</td>
                    <td>Bella (Siamese Cat)</td>
                    <td>Checkup</td>
                    <td>Dr. Emily Rodriguez</td>
                    <td>Today, 10:30 AM</td>
                    <td><span class="table-badge blue">Confirmed</span></td>
                    <td>
                        <div class="table-actions-cell">
                            <button class="table-action-button">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="table-action-button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Michael Brown</td>
                    <td>Charlie (Labrador)</td>
                    <td>Surgery</td>
                    <td>Dr. Michael Chen</td>
                    <td>Today, 11:45 AM</td>
                    <td><span class="table-badge green">In Progress</span></td>
                    <td>
                        <div class="table-actions-cell">
                            <button class="table-action-button">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="table-action-button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Sophia Wilson</td>
                    <td>Luna (Maine Coon)</td>
                    <td>Dental Care</td>
                    <td>Dr. Sarah Johnson</td>
                    <td>Today, 1:15 PM</td>
                    <td><span class="table-badge blue">Confirmed</span></td>
                    <td>
                        <div class="table-actions-cell">
                            <button class="table-action-button">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="table-action-button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>David Miller</td>
                    <td>Oliver (Beagle)</td>
                    <td>Checkup</td>
                    <td>Dr. Robert Taylor</td>
                    <td>Today, 3:00 PM</td>
                    <td><span class="table-badge blue">Confirmed</span></td>
                    <td>
                        <div class="table-actions-cell">
                            <button class="table-action-button">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="table-action-button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Jennifer Lee</td>
                    <td>Milo (Persian Cat)</td>
                    <td>Grooming</td>
                    <td>Dr. Emily Rodriguez</td>
                    <td>Tomorrow, 10:00 AM</td>
                    <td><span class="table-badge yellow">Pending</span></td>
                    <td>
                        <div class="table-actions-cell">
                            <button class="table-action-button">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="table-action-button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Robert Johnson</td>
                    <td>Cooper (German Shepherd)</td>
                    <td>Vaccination</td>
                    <td>Dr. Sarah Johnson</td>
                    <td>Tomorrow, 11:30 AM</td>
                    <td><span class="table-badge yellow">Pending</span></td>
                    <td>
                        <div class="table-actions-cell">
                            <button class="table-action-button">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="table-action-button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Amanda Garcia</td>
                    <td>Lucy (Dachshund)</td>
                    <td>Checkup</td>
                    <td>Dr. Robert Taylor</td>
                    <td>Tomorrow, 2:15 PM</td>
                    <td><span class="table-badge yellow">Pending</span></td>
                    <td>
                        <div class="table-actions-cell">
                            <button class="table-action-button">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="table-action-button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="table-pagination">
            <div class="table-pagination-info">
                Showing 1 to 8 of 24 entries
            </div>
            <div class="table-pagination-buttons">
                <button class="table-pagination-button">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="table-pagination-button active">1</button>
                <button class="table-pagination-button">2</button>
                <button class="table-pagination-button">3</button>
                <button class="table-pagination-button">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Services Page -->
{{-- <div class="page" id="services">
    <h2 class="page-title">Services</h2>

    <div class="table-container">
        <div class="table-header">
            <h3 class="table-title">All Services</h3>
            <div class="table-actions">
                <div class="table-search">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search services...">
                </div>
                <button class="table-button" id="add-service-btn">
                    <i class="fas fa-plus"></i>
                    <span>Add Service</span>
                </button>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Service Name</th>
                    <th>Category</th>
                    <th>Duration</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>General Checkup</td>
                    <td>Checkup</td>
                    <td>30 minutes</td>
                    <td>$50</td>
                    <td><span class="table-badge green">Active</span></td>
                    <td>
                        <div class="table-actions-cell">
                            <button class="table-action-button">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="table-action-button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Rabies Vaccination</td>
                    <td>Vaccination</td>
                    <td>15 minutes</td>
                    <td>$35</td>
                    <td><span class="table-badge green">Active</span></td>
                    <td>
                        <div class="table-actions-cell">
                            <button class="table-action-button">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="table-action-button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Dental Cleaning</td>
                    <td>Dental Care</td>
                    <td>60 minutes</td>
                    <td>$120</td>
                    <td><span class="table-badge green">Active</span></td>
                    <td>
                        <div class="table-actions-cell">
                            <button class="table-action-button">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="table-action-button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Spay/Neuter</td>
                    <td>Surgery</td>
                    <td>120 minutes</td>
                    <td>$250</td>
                    <td><span class="table-badge green">Active</span></td>
                    <td>
                        <div class="table-actions-cell">
                            <button class="table-action-button">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="table-action-button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Grooming - Small Pet</td>
                    <td>Grooming</td>
                    <td>45 minutes</td>
                    <td>$45</td>
                    <td><span class="table-badge green">Active</span></td>
                    <td>
                        <div class="table-actions-cell">
                            <button class="table-action-button">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="table-action-button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Grooming - Large Pet</td>
                    <td>Grooming</td>
                    <td>60 minutes</td>
                    <td>$65</td>
                    <td><span class="table-badge green">Active</span></td>
                    <td>
                        <div class="table-actions-cell">
                            <button class="table-action-button">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="table-action-button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>X-Ray</td>
                    <td>Diagnostics</td>
                    <td>30 minutes</td>
                    <td>$150</td>
                    <td><span class="table-badge green">Active</span></td>
                    <td>
                        <div class="table-actions-cell">
                            <button class="table-action-button">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="table-action-button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Ultrasound</td>
                    <td>Diagnostics</td>
                    <td>45 minutes</td>
                    <td>$180</td>
                    <td><span class="table-badge green">Active</span></td>
                    <td>
                        <div class="table-actions-cell">
                            <button class="table-action-button">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="table-action-button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="table-pagination">
            <div class="table-pagination-info">
                Showing 1 to 8 of 12 entries
            </div>
            <div class="table-pagination-buttons">
                <button class="table-pagination-button">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="table-pagination-button active">1</button>
                <button class="table-pagination-button">2</button>
                <button class="table-pagination-button">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
</div> --}}
