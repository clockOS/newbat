<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('fullname');
            $table->timestamps();
            $table->integer('parent_id')->unsigned();
            $table->unsignedInteger('available');           //当前拥有此技能且没有在执行任务的用户数
            $table->text('logo');
            $table->tinyInteger('level')->unsigned();
        });

        Schema::create('skill_user', function(Blueprint $table)
        {
            $table->integer('skill_id')->unsigned()->index();
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->primary(['user_id','skill_id']);
            $table->timestamps();
            $table->unsignedInteger('experience')->default(0);
            $table->unsignedTinyInteger('level')->default(1);
        });

        Schema::create('quest_skill', function(Blueprint $table)
        {
            $table->integer('skill_id')->unsigned()->index();
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');
            $table->integer('quest_id')->unsigned()->index();
            $table->foreign('quest_id')->references('id')->on('quests')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('decision_skill', function(Blueprint $table)
        {
            $table->integer('skill_id')->unsigned()->index();
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');
            $table->integer('decision_id')->unsigned()->index();
            $table->foreign('decision_id')->references('id')->on('decisions')->onDelete('cascade');
        });

        DB::insert("
        
        INSERT INTO `skills` (`id`, `name`, `fullname`, `created_at`, `updated_at`, `parent_id`, `available`, `logo`, `level`)
            VALUES
                (1, 'Programming Languages', 'Programming Languages', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '/img/skills/program.png', 1),
                (2, 'Visual & Auditory', 'Visual & Auditory', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '/img/skills/visual.png', 1),
                (3, 'Software Engineering & Maintenance', 'Software Engineering & Maintenance', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '/img/skills/engineer.png', 1),
                (4, 'Consultant', 'Consultant', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '/img/skills/consultant.png', 1),
                (5, 'Operating', 'Operating', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '/img/skills/operating.png', 1),
                (6, 'javascript', 'Programming Languages-javascript', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, '/img/skills/javascript.png', 2),
                (7, 'Twitter Bootstrap', 'Programming Languages-javascript-Twitter Bootstrap', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 6, 0, '/img/skills/a.png', 3),
                (8, 'English', 'Operating-Language-English', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 0, '/img/skills/english.png', 3),
                (9, 'Chinese', 'Operating-Language-Chinese', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 0, '/img/skills/chinese.png', 3),
                (10, 'Language', 'Operating-Language', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5, 0, '/img/skills/language.png', 2),
                (12, 'php', 'Programming Languages-php', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, '/img/skills/php.png', 2),
                (13, 'Laravel', 'Programming Languages-php-Laravel', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 12, 0, '/img/skills/laravel.png', 3),
                (14, 'Server', 'Software Engineering & Maintenance-Server', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 0, '/img/skills/server.png', 2),
                (15, 'Linux', 'Software Engineering & Maintenance-Server-Linux', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 14, 0, '/img/skills/linux.png', 3),
                (16, 'SCM', 'Software Engineering & Maintenance-SCM', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 0, '/img/skills/scm.png', 2),
                (17, 'Git', 'Software Engineering & Maintenance-SCM-Git', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 16, 0, '/img/skills/git.png', 3),
                (18, 'AngularJs', 'Programming Languages-javascript-AngularJs', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 6, 0, '/img/skills/angular.png', 3),
                (19, 'Wordpress', 'Programming Languages-php-Wordpress', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 12, 0, '/img/skills/wordpress.png', 3),
                (20, 'Animation', 'Visual & Auditory-Animation', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 0, '/img/skills/animation.png', 2),
                (21, 'Server Software', 'Software Engineering & Maintenance-Server Software', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 0, '/img/skills/webserver.png', 2),
                (22, 'Apache httpd', 'Software Engineering & Maintenance-Server Software-Apache httpd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 21, 0, '/img/skills/apache.png', 3),
                (23, 'Java', 'Programming Languages-Java', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, '/img/skills/java.png', 2),
                (24, 'Android', 'Programming Languages-Java-Android', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 23, 0, '/img/skills/android.png', 3),
                (25, 'Python', 'Programming Languages-Python', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, '/img/skills/python.png', 2),
                (26, 'Database', 'Software Engineering & Maintenance-Database', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 0, '/img/skills/db.png', 2),
                (27, 'MySQL', 'Software Engineering & Maintenance-Database-MySQL', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 26, 0, '/img/skills/mysql.png', 3),
                (28, 'iOS', 'Programming Languages-iOS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, '/img/skills/ios.png', 2),
                (29, 'Objective-C', 'Programming Languages-iOS-Objective-C', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 28, 0, '/img/skills/objc.png', 3),
                (30, 'Swift', 'Programming Languages-iOS-Swift', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 28, 0, '/img/skills/swift.png', 3),
                (31, 'django', 'Programming Languages-Python-django', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 25, 0, '/img/skills/django.png', 3),
                (32, 'Windows', 'Programming Languages-Windows', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, '/img/skills/microsoft.png', 2),
                (33, 'C#', 'Programming Languages-Windows-C#', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 32, 0, '/img/skills/csharp.png', 3),
                (34, 'VB', 'Programming Languages-Windows-VB', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 32, 0, '/img/skills/csharp.png', 3),
                (35, '.NET', 'Programming Languages-Windows-.NET', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 32, 0, '/img/skills/csharp.png', 3),
                (36, 'asp', 'Programming Languages-Windows-asp', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 32, 0, '/img/skills/csharp.png', 3),
                (37, 'Powershell', 'Programming Languages-Windows-Powershell', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 32, 0, '/img/skills/powershell.png', 3),
                (38, 'Symfony', 'Programming Languages-php-Symfony', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 12, 0, '/img/skills/symfony.png', 3),
                (39, 'Hadoop', 'Programming Languages-Java-Hadoop', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 23, 0, '/img/skills/hadoop.png', 3),
                (40, 'Redis', 'Software Engineering & Maintenance-Database-Redis', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 26, 0, '/img/skills/redis.png', 3),
                (41, 'MariaDB', 'Software Engineering & Maintenance-Database-MariaDB', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 26, 0, '/img/skills/mariadb.png', 3),
                (42, 'SVN', 'Software Engineering & Maintenance-SCM-SVN', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 16, 0, '/img/skills/svn.png', 3),
                (43, 'CentOS', 'Software Engineering & Maintenance-Server-CentOS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 14, 0, '/img/skills/centos.png', 3),
                (44, 'Ubuntu', 'Software Engineering & Maintenance-Server-Ubuntu', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 14, 0, '/img/skills/ubuntu.png', 3),
                (45, 'RedHat', 'Software Engineering & Maintenance-Server-RedHat', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 14, 0, '/img/skills/redhat.png', 3),
                (46, 'Debian', 'Software Engineering & Maintenance-Server-Debian', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 14, 0, '/img/skills/debian.png', 3),
                (47, 'UI Design', 'Visual & Auditory-UI Design', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 0, '/img/skills/uid.png', 2),
                (48, 'IxD', 'Visual & Auditory-Ixd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 0, '/img/skills/ixd.png', 2),
                (49, 'Video', 'Visual & Auditory-Video', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 0, '/img/skills/video.png', 2),
                (50, 'Vocal', 'Visual & Auditory-Vocal', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 0, '/img/skills/vocal.png', 2),
                (51, 'Music', 'Visual & Auditory-Music', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 0, '/img/skills/music.png', 2),
                (52, 'Graphic Design', 'Visual & Auditory-Graphic Design', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 0, '/img/skills/graphic.png', 2),
                (53, 'SQL Server', 'Software Engineering & Maintenance-Database-SQL Server', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 26, 0, '/img/skills/sql.png', 3),
                (55, 'Korean', 'Operating-Language-Korean', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 0, '/img/skills/korean.png', 3),
                (56, 'jQuery', 'Programming Languages-javascript-jQuery', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 6, 0, '/img/skills/jquery.png', 3),
                (57, 'Node.js', 'Programming Languages-javascript-Node.js', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 6, 0, '/img/skills/nodejs.png', 3),
                (58, 'C/C++', 'Programming Languages-C/C++', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, '/img/skills/ccplus.png', 2),
                (59, 'C', 'Programming Languages-C', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 58, 0, '/img/skills/ccplus.png', 3),
                (60, 'C++', 'Programming Languages-C++', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 58, 0, '/img/skills/ccplus.png', 3),
                (61, 'Ruby', 'Programming Languages-Ruby', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, '/img/skills/ruby.png', 2),
                (62, 'Ruby on Rails', 'Programming Languages-Ruby on Rails', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 61, 0, '/img/skills/ror.png', 3),
                (63, 'Mathematical', 'Programming Languages-Mathematical', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, '/img/skills/math.png', 2),
                (64, 'Matlab', 'Programming Languages-Mathematical-Matlab', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 63, 0, '/img/skills/matlab.png', 3),
                (65, 'Maple', 'Programming Languages-Mathematical-Maple', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 63, 0, '/img/skills/maple.png', 3),
                (66, 'R', 'Programming Languages-Mathematical-R', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 63, 0, '/img/skills/r.png', 3),
                (67, 'SAS', 'Programming Languages-Mathematical-SAS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 63, 0, '/img/skills/sas.png', 3),
                (68, 'Spring', 'Programming Languages-Java-Spring', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 23, 0, '/img/skills/spring.png', 3),
                (69, 'Struts', 'Programming Languages-Java-Struts', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 23, 0, '/img/skills/struts.png', 3),
                (70, 'Hibernate', 'Programming Languages-Java-Hibernate', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 23, 0, '/img/skills/hibernate.png', 3),
                (71, 'FreeBSD', 'Software Engineering & Maintenance-Server-FreeBSD', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 14, 0, '/img/skills/freebsd.png', 3),
                (72, 'Oracle', 'Software Engineering & Maintenance-Database-Oracle', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 26, 0, '/img/skills/oracle.png', 3),
                (73, 'Google', 'Programming Languages-Google', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, '/img/skills/google.png', 2),
                (74, 'Dart', 'Programming Languages-Google-Dart', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 73, 0, '/img/skills/dart.png', 3),
                (75, 'Go', 'Programming Languages-Google-Go', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 73, 0, '/img/skills/go.png', 3),
                (76, 'Windows Server', 'Software Engineering & Maintenance-Server-Windows Server', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 14, 0, '/img/skills/sql.png', 3),
                (77, 'Tomcat', 'Software Engineering & Maintenance-Server Software-Tomcat', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 21, 0, '/img/skills/tomcat.png', 3),
                (78, 'Nginx', 'Software Engineering & Maintenance-Server Software-Nginx', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 21, 0, '/img/skills/nginx.png', 3),
                (79, 'IIS', 'Software Engineering & Maintenance-Server Software-IIS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 21, 0, '/img/skills/iis.png', 3);

        ");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('skill_user');
        Schema::drop('quest_skill');
        Schema::drop('decision_skill');
        Schema::drop('skills');
    }
}
