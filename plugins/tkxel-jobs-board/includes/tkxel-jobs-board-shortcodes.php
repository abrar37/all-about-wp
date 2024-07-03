<?php

$data_arr = Tkxel_Jobs_Board_API::fetch_jobs();

// Getting query parameters for further use
$query = isset($_GET['query']) ? sanitize_text_field($_GET['query']) : '';
$category = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '';
$location = isset($_GET['location']) ? sanitize_text_field($_GET['location']) : '';


// Register shortcodes
add_shortcode('job_search_form', 'job_search_form');
add_shortcode('total_jobs_num', 'total_jobs_num');
add_shortcode('six_open_jobs', 'six_open_jobs');
add_shortcode('all_open_jobs', 'all_open_jobs');

// Shortcode callback function for [job_search_form]
function job_search_form(){

  global $query;
  global $category;
  global $location;

  $categories = array(
    '' => 'All Categories',
    'UX' => 'Design',
    'QA' => 'Quality Assurance',
    'Eng' => 'Software Engineering',
    'People Team' => 'Human Resources',
    'Marketing' => 'Marketing',
    'NOC' => 'IT Support',
    'Finance' => 'Accounts and Finance',
    'Pre Sales' => 'Sales',
    'Admin' => 'Admin',
    'Sales - SDR' => 'Lead Generation',
  );

  $all_cats = '';
  foreach($categories as $key=>$value){
    $selected = ($category==$key) ? 'selected' : '';
    $all_cats .= '<option value="'.$key.'" '.$selected.'>'. $value .'</option>';
  };


  $all_locations = array(
    '' => 'All Locations',
    'Dubai' => 'Dubai, UAE',
    'London' => 'London, UK',
    'Lahore' => 'Lahore, PK',
    'Seattle' => 'Seattle, USA',
    'Reston' => 'Reston, USA',
    'Boston' => 'Boston, USA',
  );

  $all_locs = '';
  foreach($all_locations as $key=>$value){
    $selected = ($location==$key) ? 'selected' : '';
    $all_locs .= '<option value="'.$key.'" '.$selected.'>'. $value .'</option>';
  };

  $search_form = '<form class="job-search-from" method="get" action="/jobs">
  <div class="search-field-wrp">
    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M7.36989 13.941C3.73107 13.941 0.799805 11.0097 0.799805 7.37087C0.799805 3.73205 3.73107 0.800781 7.36989 0.800781C11.0087 0.800781 13.94 3.73205 13.94 7.37087C13.94 11.0097 11.0087 13.941 7.36989 13.941ZM7.36989 1.81156C4.287 1.81156 1.81059 4.28798 1.81059 7.37087C1.81059 10.4538 4.287 12.9302 7.36989 12.9302C10.4528 12.9302 12.9292 10.4538 12.9292 7.37087C12.9292 4.28798 10.4528 1.81156 7.36989 1.81156Z" fill="#2569E6" stroke="#2569E6" stroke-width="0.5"></path>
      <path d="M12.2635 11.5469L16.8019 16.0853L16.0872 16.7999L11.5488 12.2615L12.2635 11.5469Z" fill="#2569E6" stroke="#2569E6" stroke-width="0.5"></path></svg>
    <input type="text" name="query" class="searchTerm border-0" placeholder="Search for a job title" value="'.$query.'">
  </div>

  <div class="cat-dropdown-wrp">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M9.9075 15.6C10.3725 15.6 10.7625 15.4387 11.0775 15.1162C11.3925 14.7937 11.55 14.4075 11.55 13.9575C11.55 13.5075 11.3925 13.1212 11.0775 12.7987C10.7625 12.4762 10.38 12.315 9.93 12.315C9.465 12.315 9.07125 12.4762 8.74875 12.7987C8.42625 13.1212 8.265 13.5075 8.265 13.9575C8.265 14.4075 8.42625 14.7937 8.74875 15.1162C9.07125 15.4387 9.4575 15.6 9.9075 15.6ZM14.0925 15.6C14.5425 15.6 14.9288 15.4387 15.2513 15.1162C15.5737 14.7937 15.735 14.4075 15.735 13.9575C15.735 13.5075 15.5737 13.1212 15.2513 12.7987C14.9288 12.4762 14.5425 12.315 14.0925 12.315C13.6425 12.315 13.2563 12.4762 12.9338 12.7987C12.6112 13.1212 12.45 13.5075 12.45 13.9575C12.45 14.4075 12.6112 14.7937 12.9338 15.1162C13.2563 15.4387 13.6425 15.6 14.0925 15.6ZM12 11.3925C12.45 11.3925 12.8363 11.235 13.1588 10.92C13.4812 10.605 13.6425 10.215 13.6425 9.75C13.6425 9.3 13.4812 8.91375 13.1588 8.59125C12.8363 8.26875 12.45 8.1075 12 8.1075C11.55 8.1075 11.1637 8.26875 10.8412 8.59125C10.5187 8.91375 10.3575 9.3 10.3575 9.75C10.3575 10.215 10.5187 10.605 10.8412 10.92C11.1637 11.235 11.55 11.3925 12 11.3925ZM12 21C10.77 21 9.6075 20.7638 8.5125 20.2912C7.4175 19.8187 6.46125 19.1737 5.64375 18.3562C4.82625 17.5387 4.18125 16.5825 3.70875 15.4875C3.23625 14.3925 3 13.2225 3 11.9775C3 10.7475 3.23625 9.585 3.70875 8.49C4.18125 7.395 4.82625 6.4425 5.64375 5.6325C6.46125 4.8225 7.4175 4.18125 8.5125 3.70875C9.6075 3.23625 10.7775 3 12.0225 3C13.2525 3 14.415 3.23625 15.51 3.70875C16.605 4.18125 17.5575 4.8225 18.3675 5.6325C19.1775 6.4425 19.8187 7.395 20.2912 8.49C20.7638 9.585 21 10.755 21 12C21 13.23 20.7638 14.3925 20.2912 15.4875C19.8187 16.5825 19.1775 17.5387 18.3675 18.3562C17.5575 19.1737 16.605 19.8187 15.51 20.2912C14.415 20.7638 13.245 21 12 21ZM12.0225 19.65C14.1375 19.65 15.9375 18.9038 17.4225 17.4113C18.9075 15.9188 19.65 14.1075 19.65 11.9775C19.65 9.8625 18.9075 8.0625 17.4225 6.5775C15.9375 5.0925 14.13 4.35 12 4.35C9.885 4.35 8.08125 5.0925 6.58875 6.5775C5.09625 8.0625 4.35 9.87 4.35 12C4.35 14.115 5.09625 15.9188 6.58875 17.4113C8.08125 18.9038 9.8925 19.65 12.0225 19.65Z" fill="#2569E6"></path>
    </svg>
    <select name="category" aria-label="Default select example">
      '. $all_cats .'
    </select>
  </div>
  <div class="loc-dropdown-wrp">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M7.1175 16.8825L13.6425 13.665L16.86 7.14L10.335 10.3575L7.1175 16.8825ZM12 12.9C11.745 12.9 11.5312 12.8137 11.3588 12.6412C11.1862 12.4687 11.1 12.255 11.1 12C11.1 11.745 11.1862 11.5312 11.3588 11.3588C11.5312 11.1862 11.745 11.1 12 11.1C12.255 11.1 12.4687 11.1862 12.6412 11.3588C12.8137 11.5312 12.9 11.745 12.9 12C12.9 12.255 12.8137 12.4687 12.6412 12.6412C12.4687 12.8137 12.255 12.9 12 12.9ZM12 21C10.77 21 9.6075 20.7638 8.5125 20.2912C7.4175 19.8187 6.46125 19.1737 5.64375 18.3562C4.82625 17.5387 4.18125 16.5825 3.70875 15.4875C3.23625 14.3925 3 13.23 3 12C3 10.755 3.23625 9.585 3.70875 8.49C4.18125 7.395 4.82625 6.4425 5.64375 5.6325C6.46125 4.8225 7.4175 4.18125 8.5125 3.70875C9.6075 3.23625 10.77 3 12 3C13.245 3 14.415 3.23625 15.51 3.70875C16.605 4.18125 17.5575 4.8225 18.3675 5.6325C19.1775 6.4425 19.8187 7.395 20.2912 8.49C20.7638 9.585 21 10.755 21 12C21 13.23 20.7638 14.3925 20.2912 15.4875C19.8187 16.5825 19.1775 17.5387 18.3675 18.3562C17.5575 19.1737 16.605 19.8187 15.51 20.2912C14.415 20.7638 13.245 21 12 21ZM12 19.65C14.13 19.65 15.9375 18.9038 17.4225 17.4113C18.9075 15.9188 19.65 14.115 19.65 12C19.65 9.87 18.9075 8.0625 17.4225 6.5775C15.9375 5.0925 14.13 4.35 12 4.35C9.885 4.35 8.08125 5.0925 6.58875 6.5775C5.09625 8.0625 4.35 9.87 4.35 12C4.35 14.115 5.09625 15.9188 6.58875 17.4113C8.08125 18.9038 9.885 19.65 12 19.65Z" fill="#2569E6">
      </path>
    </svg>
      <select name="location" aria-label="Default select example">
        '. $all_locs .'
      </select>
    </div>

    <div class="search-btn-wrp">
      <button type="submit">Search Jobs</button>
    </div>
</form>';
    return $search_form;
};



// Shortcode callback function for [total_jobs_num]
function total_jobs_num() {
    global $data_arr;
    return count($data_arr);
}


// Shortcode callback function for [six_open_jobs]
function six_open_jobs(){
    global $data_arr;

    $cards = '<div class="jobs-cards-wrp">';
    $job_count = 0;

    foreach ($data_arr as $job) {
        if ($job_count == 6) {
            break;
        }
        $slug = str_replace([" ", "/", ".", "&", "(", ")"], "-", $job['Job_Opening_Name']);
        $url = 'https://jobs.tkxel.com/jobs/Careers/'. $job['id'] . '/' .$slug .'?source=CareerSite';
        $cards .= '<div class="job-card">
            <a href='. $url .'>
                <div class="job-title">
                    <h6>'. $job['Job_Opening_Name'] .'</h6>
                    <svg width="12" height="11" viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M-0.00134087 5.25095C-0.00134087 5.44986 0.0776768 5.64063 0.218328 5.78128C0.358981 5.92193 0.549747 6.00095 0.748659 6.00095H9.43816L6.21766 9.21995C6.14793 9.28968 6.09261 9.37246 6.05487 9.46357C6.01714 9.55468 5.99771 9.65233 5.99771 9.75095C5.99771 9.84956 6.01714 9.94721 6.05487 10.0383C6.09261 10.1294 6.14793 10.2122 6.21766 10.2819C6.28739 10.3517 6.37017 10.407 6.46128 10.4447C6.55239 10.4825 6.65004 10.5019 6.74866 10.5019C6.84728 10.5019 6.94493 10.4825 7.03603 10.4447C7.12714 10.407 7.20993 10.3517 7.27966 10.2819L11.7797 5.78195C11.8495 5.71228 11.9049 5.62951 11.9427 5.5384C11.9805 5.44728 12 5.3496 12 5.25095C12 5.1523 11.9805 5.05461 11.9427 4.9635C11.9049 4.87238 11.8495 4.78962 11.7797 4.71995L7.27966 0.219948C7.13883 0.0791176 6.94782 0 6.74866 0C6.5495 0 6.35849 0.0791176 6.21766 0.219948C6.07683 0.360777 5.99771 0.551784 5.99771 0.750948C5.99771 0.950111 6.07683 1.14112 6.21766 1.28195L9.43816 4.50095H0.748659C0.549747 4.50095 0.358981 4.57997 0.218328 4.72062C0.0776768 4.86127 -0.00134087 5.05203 -0.00134087 5.25095Z" fill="#2569E6"></path></svg>
                </div>
                <div class="job-location">
                    <p>'. $job['City'] .', '. $job['Country'] .'</p>
                </div>
            </a>
        </div>';
        $job_count++;
    }
    $cards .= '</div>'; 

    return $cards;
};


// Shortcode callback function for [all_open_jobs]
function all_open_jobs() {
    global $data_arr;

    // Capture search query parameters global
    global $query;
    global $category;
    global $location;

    $cards = '<div class="jobs-cards-wrp">';

    // Create a regex pattern for the query (split into individual words)
    $query_pattern = '';
    if ($query) {
        $query_words = preg_split('/\s+/', preg_quote($query, '/'));
        $query_pattern = '/(' . implode('|', $query_words) . ')/i';
    }

    // Variable to count matching jobs
    $matching_jobs_count = 0;

    // Loop through the job data
    foreach ($data_arr as $job) {
        // Check if job matches the filter criteria
        $matchesQuery = $query === '' || preg_match($query_pattern, $job['Job_Opening_Name']);
        $matchesCategory = $category === '' || stripos($job['Department_Name']['name'], $category) !== false;
        $matchesLocation = $location === '' || stripos($job['City'], $location) !== false;

        // If all criteria match, add the job to the output
        if ($matchesQuery && $matchesCategory && $matchesLocation) {
          $matching_jobs_count++;
          $slug = str_replace([" ", "/", ".", "&", "(", ")"], "-", $job['Job_Opening_Name']);
          $url = 'https://jobs.tkxel.com/jobs/Careers/' . $job['id'] . '/' . $slug . '?source=CareerSite';

          $cards .= '<div class="job-card">
              <a href="' . $url . '">
                  <div class="job-title">
                      <h6>' . $job['Job_Opening_Name'] . '</h6>
                      <svg width="12" height="11" viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M-0.00134087 5.25095C-0.00134087 5.44986 0.0776768 5.64063 0.218328 5.78128C0.358981 5.92193 0.549747 6.00095 0.748659 6.00095H9.43816L6.21766 9.21995C6.14793 9.28968 6.09261 9.37246 6.05487 9.46357C6.01714 9.55468 5.99771 9.65233 5.99771 9.75095C5.99771 9.84956 6.01714 9.94721 6.05487 10.0383C6.09261 10.1294 6.14793 10.2122 6.21766 10.2819C6.28739 10.3517 6.37017 10.407 6.46128 10.4447C6.55239 10.4825 6.65004 10.5019 6.74866 10.5019C6.84728 10.5019 6.94493 10.4825 7.03603 10.4447C7.12714 10.407 7.20993 10.3517 7.27966 10.2819L11.7797 5.78195C11.8495 5.71228 11.9049 5.62951 11.9427 5.5384C11.9805 5.44728 12 5.3496 12 5.25095C12 5.1523 11.9805 5.05461 11.9427 4.9635C11.9049 4.87238 11.8495 4.78962 11.7797 4.71995L7.27966 0.219948C7.13883 0.0791176 6.94782 0 6.74866 0C6.5495 0 6.35849 0.0791176 6.21766 0.219948C6.07683 0.360777 5.99771 0.551784 5.99771 0.750948C5.99771 0.950111 6.07683 1.14112 6.21766 1.28195L9.43816 4.50095H0.748659C0.549747 4.50095 0.358981 4.57997 0.218328 4.72062C0.0776768 4.86127 -0.00134087 5.05203 -0.00134087 5.25095Z" fill="#2569E6"></path></svg>
                  </div>
                  <div class="job-location">
                  
                      <p>' . $job['City'] . ', ' . $job['Country'] . '</p>
                  </div>
              </a>
          </div>';
        }
    }

    $cards .= '</div>
              <div class="job-pagination-wrp">
                <div class="job-pagination">
                  <button id="prevBtn"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.8478 6.25281H2.71861L9.37978 0.275281C9.4863 0.178933 9.42163 0 9.28088 0H7.59751C7.52333 0 7.45295 0.027528 7.39779 0.0766853L0.209732 6.52416C0.143898 6.58315 0.0910992 6.65608 0.0549134 6.73801C0.0187275 6.81994 0 6.90895 0 6.99902C0 7.08908 0.0187275 7.17809 0.0549134 7.26002C0.0910992 7.34195 0.143898 7.41488 0.209732 7.47388L7.43964 13.9607C7.46817 13.9862 7.50241 14 7.53855 14H9.27897C9.41973 14 9.4844 13.8191 9.37788 13.7247L2.71861 7.74719H13.8478C13.9315 7.74719 14 7.6764 14 7.58989V6.41011C14 6.3236 13.9315 6.25281 13.8478 6.25281Z" fill="#101010"></path></svg></button>
                  <div class="page-numbers"></div>
                  <button id="nextBtn"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.152168 6.25281H11.2814L4.62022 0.275281C4.5137 0.178933 4.57837 0 4.71912 0H6.40249C6.47667 0 6.54705 0.027528 6.60221 0.0766853L13.7903 6.52416C13.8561 6.58315 13.9089 6.65608 13.9451 6.73801C13.9813 6.81994 14 6.90895 14 6.99902C14 7.08908 13.9813 7.17809 13.9451 7.26002C13.9089 7.34195 13.8561 7.41488 13.7903 7.47388L6.56036 13.9607C6.53183 13.9862 6.49759 14 6.46145 14H4.72103C4.58027 14 4.5156 13.8191 4.62212 13.7247L11.2814 7.74719H0.152168C0.0684757 7.74719 0 7.6764 0 7.58989V6.41011C0 6.3236 0.0684757 6.25281 0.152168 6.25281Z" fill="#101010"></path></svg></button>
                </div></div>'; 

    // Determine the correct word for vacancy/vacancies
    $vacancy_word = $matching_jobs_count === 1 ? 'vacancy' : 'vacancies';
    $cards = '<div class="total-jobs" style="padding-bottom: 10px;"><strong>Result: </strong>'. $matching_jobs_count.' '.$vacancy_word .'</div> '. $cards;
  return $cards;
};

