<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Table Filtering</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h1>Bootstrap Table Filtering</h1>

  <!-- Filters -->
  <div class="row mt-4">
    <!-- Age Filter -->
    <div class="col-md-3">
      <label for="ageFilter">Filter by Age:</label>
      <select class="form-control" id="ageFilter">
        <option value="all">All</option>
        <option value="under18">Under 18</option>
        <option value="18to30">18 - 30</option>
        <option value="30to50">30 - 50</option>
        <option value="above50">Above 50</option>
      </select>
    </div>
    <!-- Gender Filter -->
    <div class="col-md-3">
      <label for="genderFilter">Filter by Gender:</label>
      <select class="form-control" id="genderFilter">
        <option value="all">All</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
      </select>
    </div>
  </div>

  <!-- Table -->
  <div class="row mt-5">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
          </tr>
        </thead>
        <tbody id="tableBody">
          <!-- Table rows will be populated here -->
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  // Dummy data (can be replaced with actual data)
  const people = [
    { name: 'John', age: 25, gender: 'male' },
    { name: 'Jane', age: 35, gender: 'female' },
    { name: 'Alex', age: 17, gender: 'male' },
    { name: 'Sam', age: 45, gender: 'other' },
    // Add more dummy data here
  ];

  // Function to populate table
  function populateTable(data) {
    const tableBody = document.getElementById('tableBody');
    tableBody.innerHTML = '';

    data.forEach(person => {
      const row = document.createElement('tr');
      row.innerHTML = `
        <td>${person.name}</td>
        <td>${person.age}</td>
        <td>${person.gender}</td>
      `;
      tableBody.appendChild(row);
    });
  }

  // Function to filter data
  function filterData() {
    const ageFilter = document.getElementById('ageFilter').value;
    const genderFilter = document.getElementById('genderFilter').value;

    let filteredData = people;

    if (ageFilter !== 'all') {
      switch (ageFilter) {
        case 'under18':
          filteredData = filteredData.filter(person => person.age < 18);
          break;
        case '18to30':
          filteredData = filteredData.filter(person => person.age >= 18 && person.age <= 30);
          break;
        case '30to50':
          filteredData = filteredData.filter(person => person.age > 30 && person.age <= 50);
          break;
        case 'above50':
          filteredData = filteredData.filter(person => person.age > 50);
          break;
      }
    }

    if (genderFilter !== 'all') {
      filteredData = filteredData.filter(person => person.gender === genderFilter);
    }

    populateTable(filteredData);
  }

  // Initial table population
  populateTable(people);

  // Event listeners for filters
  document.getElementById('ageFilter').addEventListener('change', filterData);
  document.getElementById('genderFilter').addEventListener('change', filterData);
</script>

</body>
</html>
