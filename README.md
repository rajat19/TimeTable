# Timetable Management System
The project is the website version of [Timetable Management System](https://github.com/rajat19/Timetable-App) version 1.0.0

## Objective
The main objective of the project is to present an interactive website to manage already created timetables for college in realtime.
## Website Link
The complete project is available at [Timetable](http://paradox.eu5.org)

## Languages and functionalities used
1. PHP
2. Jquery
3. HTML/CSS
4. Materialize CSS
5. Mysql Database
6. PHP Job Scheduler
7. [Firebase](https://firebase.google.com)

## Users
1. Admin
2. Faculties
3. Students (Class Representatives)

## Functionalities

#### 1. Marking Attendance
1. Can be done by the Faculty in consideration or can even request the Admin to mark from the admin panel.
2. Attendance can only be marked within a time limit which is set by Admin.
3. Afterwards the faculty would be marked absent if the attendance is marked till the maximum time limit.
4. Also Admmin can view attendance for previous days.

#### 2. Marking Leave
1. Faculty can request for leave from Admin.
2. Admin can allow or disallow leaves for the faculty in consideration.
3. If a leave is allowed, Admin needs to assign a substitution for the day of leave.
4. Leaves can be viewed through Admin Panel.
5. Also faculties can view their previous and future pending leaves.
6. If the leave is neither allowed or disallowed, it would marked as disallowed after day in consideration had passed.

#### 3. Allot Class Timetable
1. Timetables can be allotted according to either of Class, Lab or Faculty.
2. If there is a conflict in timetable, it would be notified to the admin.

#### 4. View Timetables
1. All allotted timetables can be viewed by admin.
2. Faculties can view their own timetables.
3. Class Representatives can view the class timetable and can also see today's schedule which would be containing any substitution if allotted for the class.
4. Also free to view class timetable is available without login for general view.

#### 5. Report Faculty's Absence
1. Class Representative can report faculty's absence from the class.
2. Admin would be notified about it so as to take required actions.

#### 6. Assign Substitutions
1. Substitutions are assigned by the admin for any faculty absent or if faculty is on leave.
2. The faculty who had been assigned substitution can accept or deny the substitution.
3. In case of denial, a proper reason is required to be provided for denying the substitution.
4. If the faculty accepts the substitution, then the respective class in consideration would also be notified about the substitution for the day.
5. Substitutions can later be changed if the admin wishes to do so.

#### 7. Notifications
There are many different types of notifications for admin, faculty and the students.
