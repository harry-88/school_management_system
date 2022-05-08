create table parents(
    parent_id int auto_increment primary key,
    first_name varchar(20),
    last_name varchar(20),
    mobile_number varchar(11),
    cnic varchar(13),
    email varchar(30) unique,
    address varchar(100),
    occupation varchar(30),
    designation varchar(30)
);
create table teachers(
    teacher_id int auto_increment primary key,
    first_name varchar(20),
    last_name varchar(20),
    mobile_number varchar(11),
    cnic varchar(13),
    address varchar(100),
    gender boolean,
    qualification varchar(30),
    subject varchar(20),
    joining_date timestamp,
    email varchar(30) unique,
    password varchar(30)
);
create table classes(
    class_name varchar(20) primary key unique,
    section char(1),
    incharge_id int,
    foreign key(incharge_id) references teachers(teacher_id)
);
create table students(
    student_id int auto_increment,
    first_name varchar(20),
    last_name varchar(20),
    class_name varchar(20),
    mobile_number varchar(11),
    cnic varchar(13),
    address varchar(100),
    gender boolean,
    blood_group char(3),
    email varchar(30) unique,
    password varchar(30),
    parent_id int,
    primary key(student_id),
    foreign key(class_name) references classes(class_name),
    foreign key(parent_id) references Parents(parent_id)
);
create table subjects(
    subject_id int primary key auto_increment,
    subject_title varchar(30),
    subject_type varchar(20),
    class_name varchar(20),
    foreign key(class_name) references Classes(class_name)
);
create table subject_teached(
    teacher_id int,
    subject_id int,
    primary key(teacher_id, subject_id),
    foreign key(subject_id) references subjects(subject_id),
    foreign key(teacher_id) references Teachers(teacher_id)
);
create table subjects_registered(
    subject_id int,
    student_id int,
    primary key(subject_id, student_id),
    foreign key(subject_id) references Subjects(subject_id),
    foreign key(student_id) references Students(student_id)
);
/*
 teacher -----incharges-----class 
 */
# Teachers
insert into Teachers(
        first_name,
        last_name,
        mobile_number,
        cnic,
        address,
        gender,
        qualification,
        email,
        password
    )
values (
        'Mustijab',
        'Haider',
        '03001234567',
        '3520181502783',
        'Bata Pur Lahore Cantt.',
        1,
        'Mechanical Enginerring',
        'Physics',
        'mustijab.haider@gmail.com',
        'Mustijab1234@'
    );
insert into Teachers(
        first_name,
        last_name,
        mobile_number,
        cnic,
        address,
        gender,
        qualification,
        email,
        password
    )
values (
        'Rana',
        'Waqas',
        '03001234567',
        '3520181502783',
        'Township Lahore',
        1,
        'Software Enginerring',
        'Computer Science',
        'rana.waqas@gmail.com',
        'Waqas1234@'
    );
insert into Teachers(
        first_name,
        last_name,
        mobile_number,
        cnic,
        address,
        gender,
        qualification,
        email,
        password
    )
values (
        'Mehr',
        'Nisa',
        '03001234567',
        '3520181502783',
        'Township Lahore Cantt.',
        1,
        'MS Computer Science',
        'Computer Science',
        'mehr.nisa@gmail.com',
        'MehrNisa1234@'
    );
insert into Teachers(
        first_name,
        last_name,
        mobile_number,
        cnic,
        address,
        gender,
        qualification,
        email,
        password
    )
values (
        'Rizwan',
        'Bashir',
        '03001234567',
        '3520181502783',
        'Al Rahim Garden, Lahore Cantt.',
        1,
        'M.Phil Urdu',
        'Urdu',
        'rizwan.bashir@gmail.com',
        'RizwanBashir1234@'
    );
insert into Teachers(
        first_name,
        last_name,
        mobile_number,
        cnic,
        address,
        gender,
        qualification,
        email,
        password
    )
values (
        'Mahmood',
        'Ali',
        '03001234567',
        '3520181502783',
        'Iqbal Town Lahore Cantt.',
        1,
        'M.Phil Mathematics',
        'Mathematices',
        'mahmood.ali@gmail.com',
        'MahmoodAli1234@'
    );
insert into Teachers(
        first_name,
        last_name,
        mobile_number,
        cnic,
        address,
        gender,
        qualification,
        email,
        password
    )
values (
        'Rehan',
        'Ali',
        '03001234567',
        '3520181502783',
        'Iqbal Town Lahore Cantt.',
        1,
        'Software Engineering',
        'Computer Science',
        'rehan.ali@gmail.com',
        'RehanAli1234@'
    );
insert into Teachers(
        first_name,
        last_name,
        mobile_number,
        cnic,
        address,
        gender,
        qualification,
        email,
        password
    )
values (
        'Ammad',
        'Uddin',
        '03001234567',
        '3520181502783',
        'Bata Pur Lahore Cantt.',
        1,
        'M.Phil English',
        'English',
        'ammad.uddin@gmail.com',
        'AmmadUddin1234@'
    );
insert into Teachers(
        first_name,
        last_name,
        mobile_number,
        cnic,
        address,
        gender,
        qualification,
        email,
        password
    )
values (
        'Jiger',
        'Ali',
        '03001234567',
        '3520181502783',
        'Bata Pur Lahore Cantt.',
        1,
        'M.Phil Chemistry',
        'Chemistry',
        'jiger.ali@gmail.com',
        'JigerAli1234@'
    );
insert into Teachers(
        first_name,
        last_name,
        mobile_number,
        cnic,
        address,
        gender,
        qualification,
        email,
        password
    )
values (
        'Ishfaq',
        'Ahmad',
        '03001234567',
        '3520181502783',
        'Bata Pur Lahore Cantt.',
        1,
        'M.Phil Bilogy',
        'Biology',
        'ishfaq.ahmad@gmail.com',
        'IshfaqAhmad1234@'
    );
insert into Teachers(
        first_name,
        last_name,
        mobile_number,
        cnic,
        address,
        gender,
        qualification,
        email,
        password
    )
values (
        'Tanzeela',
        'Shakeel',
        '03001234567',
        '3520181502783',
        'Johar Town Lahore Cantt.',
        0,
        'Software Engineer',
        'tanzeela.shakeel@gmail.com',
        'TanzeelaShakeel1234@'
    );
insert into Teachers(
        first_name,
        last_name,
        mobile_number,
        cnic,
        address,
        gender,
        qualification,
        email,
        password
    )
values (
        'Habib',
        'Ali',
        '03001234567',
        '3520181502783',
        'Johar Town Lahore Cantt.',
        0,
        'M.Phil Islamiate',
        'Islamiat',
        'habib.ali@gmail.com',
        'HabibAli1234@'
    );
insert into Teachers(
        first_name,
        last_name,
        mobile_number,
        cnic,
        address,
        gender,
        qualification,
        email,
        password
    )
values (
        'Faheem',
        'Alvi',
        '03001234567',
        '3520181502783',
        'Johar Town Lahore Cantt.',
        0,
        'M.Phil Pak Studies',
        'Pak Studies',
        'faheem.alvi@gmail.com',
        'FaheemAlvi1234@'
    );
# Parents
insert into Parents(
        first_name,
        last_name,
        mobile_number,
        cnic,
        email,
        address,
        occupation
    )
values(
        'Shahid',
        'Hussain',
        '03004629248',
        '3520115599783',
        'shahid.hussain@gmail.com',
        'Lahore Cantt.',
        'Police Officer'
    );
insert into Parents(
        first_name,
        last_name,
        mobile_number,
        cnic,
        email,
        address,
        occupation
    )
values(
        'Muhammad',
        'Aslam',
        '03001234567',
        '3520115599456',
        'muhammad.aslam@gmail.com',
        'Lahore Cantt.',
        'Police Officer'
    );
insert into Parents(
        first_name,
        last_name,
        mobile_number,
        cnic,
        email,
        address,
        occupation
    )
values(
        'Iqbal',
        'Ahmad',
        '03004623248',
        '3520159599783',
        'iqbal.ahmad@gmail.com',
        'Lahore Cantt.',
        'Teacher'
    );
insert into Parents(
        first_name,
        last_name,
        mobile_number,
        cnic,
        email,
        address,
        occupation
    )
values(
        'Amjad',
        'Ali',
        '03004623234',
        '3520159599745',
        'amjad.ali@gmail.com',
        'Lahore Cantt.',
        'Enginner'
    );
insert into Parents(
        first_name,
        last_name,
        mobile_number,
        cnic,
        email,
        address,
        occupation
    )
values(
        'Asghar',
        'Awan',
        '03004623234',
        '3520159599745',
        'asghar.awan@gmail.com',
        'Lahore Cantt.',
        'Mechanic'
    );
insert into Parents(
        first_name,
        last_name,
        mobile_number,
        cnic,
        email,
        address,
        occupation
    )
values(
        'Shahid',
        'Maqbool',
        '03004623234',
        '3520159599745',
        'shahid.maqbool@gmail.com',
        'Lahore Cantt.',
        'Engineer'
    );
insert into Parents(
        first_name,
        last_name,
        mobile_number,
        cnic,
        email,
        address,
        occupation
    )
values(
        'Ijaz',
        'Shah',
        '03004623234',
        '3520159599745',
        'ijaz.shah@gmail.com',
        'Lahore Cantt.',
        'Electrical Engineer'
    );
# Classes
insert into Classes(class_name, section, incharge_id)
values('Seven', 'A', 3);
insert into Classes(class_name, section, incharge_id)
values('Ten', 'A', 2);
insert into Classes(class_name, section, incharge_id)
values('Nine', 'A', 4);
insert into Classes(class_name, section, incharge_id)
values('One', 'A', 10);
insert into Classes(class_name, section, incharge_id)
values('Eight', 'A', 9);
insert into Classes(class_name, section, incharge_id)
values('Two', 'A', 6);
insert into Classes(class_name, section, incharge_id)
values('Three', 'A', 7);
insert into Classes(class_name, section, incharge_id)
values('Five', 'A', 5);
insert into Classes(class_name, section, incharge_id)
values('Six', 'A', 8);
insert into Classes(class_name, section, incharge_id)
values('Four', 'A', 1);
# Subjects
insert into Subjects(subject_title, subject_type, class_name)
values('English 10', 'Compulsory', 'Ten');
insert into Subjects(subject_title, subject_type, class_name)
values('Urdu 10', 'Compulsory', 'Ten');
insert into Subjects(subject_title, subject_type, class_name)
values('Mathematics 10', 'Compulsory', 'Ten');
insert into Subjects(subject_title, subject_type, class_name)
values('Biology 10', 'Compulsory', 'Ten');
insert into Subjects(subject_title, subject_type, class_name)
values('Chemistry 10', 'Compulsory', 'Ten');
insert into Subjects(subject_title, subject_type, class_name)
values('Physics 10', 'Compulsory', 'Ten');
insert into Subjects(subject_title, subject_type, class_name)
values('Computer 10', 'Compulsory', 'Ten');
insert into Subjects(subject_title, subject_type, class_name)
values('Islamiat 10', 'Compulsory', 'Ten');
insert into Subjects(subject_title, subject_type, class_name)
values('Pak Studies 10', 'Compulsory', 'Ten');
insert into Subjects(subject_title, subject_type, class_name)
values('English 9', 'Compulsory', 'Nine');
insert into Subjects(subject_title, subject_type, class_name)
values('Urdu 9', 'Compulsory', 'Nine');
insert into Subjects(subject_title, subject_type, class_name)
values('Mathematics 9', 'Compulsory', 'Nine');
insert into Subjects(subject_title, subject_type, class_name)
values('Biology 9', 'Compulsory', 'Nine');
insert into Subjects(subject_title, subject_type, class_name)
values('Chemistry 9', 'Compulsory', 'Nine');
insert into Subjects(subject_title, subject_type, class_name)
values('Physics 9', 'Compulsory', 'Nine');
insert into Subjects(subject_title, subject_type, class_name)
values('Computer 9', 'Compulsory', 'Nine');
insert into Subjects(subject_title, subject_type, class_name)
values('Islamiat 9', 'Compulsory', 'Nine');
insert into Subjects(subject_title, subject_type, class_name)
values('Pak Studies 9', 'Compulsory', 'Nine');
insert into Subjects(subject_title, subject_type, class_name)
values('English 8', 'Compulsory', 'Eight');
insert into Subjects(subject_title, subject_type, class_name)
values('Urdu 8', 'Compulsory', 'Eight');
insert into Subjects(subject_title, subject_type, class_name)
values('Mathematics 8', 'Compulsory', 'Eight');
insert into Subjects(subject_title, subject_type, class_name)
values('Science 8', 'Compulsory', 'Eight');
insert into Subjects(subject_title, subject_type, class_name)
values('Computer 8', 'Compulsory', 'Eight');
insert into Subjects(subject_title, subject_type, class_name)
values('Islamiat 8', 'Compulsory', 'Eight');
insert into Subjects(subject_title, subject_type, class_name)
values('English 6', 'Compulsory', 'Six');
insert into Subjects(subject_title, subject_type, class_name)
values('Urdu 6', 'Compulsory', 'Six');
insert into Subjects(subject_title, subject_type, class_name)
values('Math 6', 'Compulsory', 'Six');
insert into Subjects(subject_title, subject_type, class_name)
values('Science 6', 'Compulsory', 'Six');
insert into Subjects(subject_title, subject_type, class_name)
values('Pak Studies 6', 'Compulsory', 'Six');
insert into Subjects(subject_title, subject_type, class_name)
values('Islamiat 6', 'Compulsory', 'Six');
insert into Subjects(subject_title, subject_type, class_name)
values('English 1', 'Compulsory', 'One');
insert into Subjects(subject_title, subject_type, class_name)
values('Urdu 1', 'Compulsory', 'One');
insert into Subjects(subject_title, subject_type, class_name)
values('Math 1', 'Compulsory', 'One');
insert into Subjects(subject_title, subject_type, class_name)
values('Drawing 1', 'Compulsory', 'One');
insert into Subjects(subject_title, subject_type, class_name)
values('Spoken English 1', 'Compulsory', 'One');
#Students
insert into Students(
        first_name,
        last_name,
        class_name,
        mobile_number,
        cnic,
        address,
        gender,
        blood_group,
        email,
        password,
        parent_id
    )
values(
        'Jawad',
        'Shah',
        'Ten',
        '03214876427',
        '3520181502783',
        'Lahore Cantt.',
        1,
        'B+',
        'jawad.shah@gmail.com',
        'JawadShah1234@',
        1
    );
insert into Students(
        first_name,
        last_name,
        class_name,
        mobile_number,
        cnic,
        address,
        gender,
        blood_group,
        email,
        password,
        parent_id
    )
values(
        'Ammar',
        'Shah',
        'Ten',
        '03214876427',
        '3520181502783',
        'Lahore Cantt.',
        1,
        'B+',
        'ammar.shah@gmail.com',
        'AmmarShah1234@',
        1
    );
insert into Students(
        first_name,
        last_name,
        class_name,
        mobile_number,
        cnic,
        address,
        gender,
        blood_group,
        email,
        password,
        parent_id
    )
values(
        'Hammad',
        'Aslam',
        'Nine',
        '03213456427',
        '3520181502783',
        'Lahore Cantt.',
        1,
        'O-',
        'hammad.aslam@gmail.com',
        'HammadAslam1234@',
        2
    );
insert into Students(
        first_name,
        last_name,
        class_name,
        mobile_number,
        cnic,
        address,
        gender,
        blood_group,
        email,
        password,
        parent_id
    )
values(
        'Adil',
        'Shahid',
        'Nine',
        '03213456427',
        '3520181502783',
        'Lahore Cantt.',
        1,
        'A-',
        'adil.shahid@gmail.com',
        'AdilShahid1234@',
        1
    );