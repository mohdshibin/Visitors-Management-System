# Create Visitors Management System

Create a system for scheduling and monitoring visitor activities at a workplace. There will be two types of users: administrators, who can approve or reject requests for visitors and view the visitors' activities, such as how many hours they spend in the office. The second user is a visitor to the workplace.

Laravel & PHP coding standards Doc : [![](https://developers.google.com/drive/images/drive_icon.png)https://docs.google.com/document/d/1Xs0WSPXn8uiQGKH6GlxXkLP-d04fiGkylVaI240a_PU/edit#heading=h.2fsys04n586i](https://docs.google.com/document/d/1Xs0WSPXn8uiQGKH6GlxXkLP-d04fiGkylVaI240a_PU/edit#heading=h.2fsys04n586i) - Connect your Google account

DataBase Standards : [![](https://developers.google.com/drive/images/drive_icon.png)https://docs.google.com/document/d/1YP8R9w6qL9vJRxNPR0r-sZl2rRdxvNdlY49h3gjkBi8/edit#heading=h.4jvyzvh1z4gt](https://docs.google.com/document/d/1YP8R9w6qL9vJRxNPR0r-sZl2rRdxvNdlY49h3gjkBi8/edit#heading=h.4jvyzvh1z4gt) - Connect your Google account

## Implement Registration and Login
Implement Registration for Admin with a field user name, email and password (secure password).
Implement Login for both Admin and Visitors with the field email and password.

## Visitors Activity

In the system, there will be an option to forward visitor requests to the office.

In the request form include fields like Full name, contact number, email, address, purpose, no of people etc. There will be a request parking slot option.

The visitor will get login credentials via email. After login, there will be an option for both check-in and check-out.

NOTE : The parking slot will be free for 5hr after that per hour Rs.10 will charged

## Admin Activities

Administrators have access to all requests and can take the appropriate action (accept or deny, including parking slots as well).

Based on his action needs to send email communication to the visitors.

Send login passwords to the visitors via email communication.

Admin can view check-in and check-out time of visitors.

## Create a cron for send payment link to visitor

The parking slot will be free for 5hr after that per hour Rs.10 will be charged.

When the visitor check-out from the office, we need to send a payment link to the user if he spends more than 5hr at the workplace.

Open PG documentation reference : [https://docs.bankopen.com/reference](https://docs.bankopen.com/reference "https://docs.bankopen.com/reference")

