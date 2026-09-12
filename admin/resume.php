<?php

include "../include/config.php";
include "header.php";
include "sidebar.php";


// ==============================
// USER / PROFILE
// ==============================

$sql = "SELECT * FROM users WHERE id = 1";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);


// ==============================
// EDUCATION
// ==============================

$education = mysqli_query($conn,
    "SELECT * FROM education
     WHERE user_id = 1
     ORDER BY end_year DESC"
);


// ==============================
// EXPERIENCE
// ==============================

$experience = mysqli_query($conn,
    "SELECT * FROM experience
     WHERE user_id = 1
     ORDER BY start_year DESC"
);


// ==============================
// SKILLS
// ==============================

$skills = mysqli_query($conn,
    "SELECT * FROM skills
     WHERE id = 1
     ORDER BY id DESC"
);


// ==============================
// CERTIFICATIONS
// ==============================

$certifications = mysqli_query($conn,
    "SELECT * FROM certifications
     WHERE id = 1"
     
    //  ORDER BY year DESC
);


// ==============================
// INTERESTS
// ==============================

$interests = mysqli_query($conn,
    "SELECT * FROM interests
     WHERE id = 1
     ORDER BY id DESC"
);


// ==============================
// LANGUAGES
// ==============================

$languages = mysqli_query($conn,
    "SELECT * FROM languages
     WHERE id = 1
     ORDER BY id DESC"
);


// ==============================
// REFEREES
// ==============================

$referees = mysqli_query($conn,
    "SELECT * FROM referees
     WHERE id = 1
     ORDER BY id DESC"
);


// ==============================
// AWARDS / ACHIEVEMENTS
// ==============================

$awards = mysqli_query($conn,
    "SELECT * FROM awards
     WHERE id = 1
     ORDER BY id DESC"
);

?>


<!-- Main Content -->
<div class="page-wrapper">
    <!-- Page Header -->
     <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Resume</h4>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-20">
                <a href="add-Services.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Edit Resume</a>
            </div>
        </div>
     </div>


    <!-- ============================== -->
    <!-- PROFESSIONAL SUMMARY -->
    <!-- ============================== -->

    <div class="card shadow-sm border-0 mb-4">

        <div class="card-header bg-white py-3">

            <h3 class="h5 mb-1">
                <i class="bi bi-file-person me-2"></i>
                My Career Objective
            </h3>

            <!-- <p class="text-muted small mb-0">
                Information displayed in the summary section of your resume.
            </p> -->

        </div>


        <div class="card-body p-4">

            <form action="resume-summary-update.php" method="POST">

                <input
                    type="hidden"
                    name="user_id"
                    value="<?= $data['id'] ?>"
                >


                <div class="mb-3">

                    <label for="summary" class="form-label">
                        Main Ojective
                    </label>

                    <textarea
                        name="summary"
                        id="summary"
                        rows="5"
                        class="form-control"
                        placeholder="Write a brief professional summary..."
                    ><?= htmlspecialchars($data['slogan'] ?? '') ?></textarea>

                    <!-- <div class="form-text">
                        Keep this concise and focused on your professional background,
                        strengths and career objectives.
                    </div> -->

                </div>


                <button
                    type="submit"
                    class="btn btn-primary"
                >

                    <i class="bi bi-check-lg me-1"></i>

                    Save Objective

                </button>

            </form>

        </div>

    </div>



    <!-- ============================== -->
    <!-- EDUCATION -->
    <!-- ============================== -->

    <div class="card shadow-sm border-0 mb-4">

        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">

            <div>

                <h3 class="h5 mb-1">
                    <i class="bi bi-mortarboard me-2"></i>
                    Education
                </h3>

                <p class="text-muted small mb-0">
                    Manage your academic qualifications.
                </p>

            </div>


            <a
                href="education-add.php"
                class="btn btn-primary btn-sm"
            >

                <i class="bi bi-plus-lg me-1"></i>

                Add Education

            </a>

        </div>


        <div class="card-body p-0">

            <?php if (mysqli_num_rows($education) > 0) { ?>

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">

                            <tr>

                                <th>Degree / Qualification</th>

                                <th>Institution</th>

                                <th>Location</th>

                                <th>Period</th>

                                <th>Status</th>

                                <th class="text-end">Actions</th>

                            </tr>

                        </thead>


                        <tbody>

                            <?php while ($edu = mysqli_fetch_assoc($education)) { ?>

                                <tr>

                                    <td>
                                        <strong>
                                            <?= htmlspecialchars($edu['degree']) ?>
                                        </strong>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($edu['institution']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($edu['location']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($edu['start_year']) ?>
                                        -
                                        <?= htmlspecialchars($edu['end_year']) ?>
                                    </td>

                                    <td>

                                        <?php if ($edu['status'] == 1) { ?>

                                            <span class="badge bg-success">
                                                Active
                                            </span>

                                        <?php } else { ?>

                                            <span class="badge bg-secondary">
                                                Hidden
                                            </span>

                                        <?php } ?>

                                    </td>

                                    <td class="text-end">

                                        <a
                                            href="education-edit.php?id=<?= $edu['id'] ?>"
                                            class="btn btn-sm btn-outline-primary"
                                        >
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <a
                                            href="education-delete.php?id=<?= $edu['id'] ?>"
                                            class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Delete this education record?')"
                                        >
                                            <i class="bi bi-trash"></i>
                                        </a>

                                    </td>

                                </tr>

                            <?php } ?>

                        </tbody>

                    </table>

                </div>

            <?php } else { ?>

                <div class="text-center py-5">

                    <i class="bi bi-mortarboard fs-1 text-muted"></i>

                    <p class="text-muted mt-3 mb-0">
                        No education records have been added yet.
                    </p>

                </div>

            <?php } ?>

        </div>

    </div>



    <!-- ============================== -->
    <!-- PROFESSIONAL EXPERIENCE -->
    <!-- ============================== -->

    <div class="card shadow-sm border-0 mb-4">

        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">

            <div>

                <h3 class="h5 mb-1">
                    <i class="bi bi-briefcase me-2"></i>
                    Professional Experience
                </h3>

                <p class="text-muted small mb-0">
                    Manage your employment and professional experience.
                </p>

            </div>


            <a
                href="experience-add.php"
                class="btn btn-primary btn-sm"
            >

                <i class="bi bi-plus-lg me-1"></i>

                Add Experience

            </a>

        </div>


        <div class="card-body p-0">

            <?php if (mysqli_num_rows($experience) > 0) { ?>

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">

                            <tr>

                                <th>Position</th>

                                <th>Company</th>

                                <th>Location</th>

                                <th>Period</th>

                                <th>Status</th>

                                <th class="text-end">Actions</th>

                            </tr>

                        </thead>


                        <tbody>

                            <?php while ($exp = mysqli_fetch_assoc($experience)) { ?>

                                <tr>

                                    <td>
                                        <strong>
                                            <?= htmlspecialchars($exp['job_title']) ?>
                                        </strong>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($exp['company']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($exp['location']) ?>
                                    </td>

                                    <td>

                                        <?= htmlspecialchars($exp['start_year']) ?>

                                        -

                                        <?php

                                        if ($exp['is_present']) {

                                            echo "Present";

                                        } else {

                                            echo htmlspecialchars($exp['end_year']);

                                        }

                                        ?>

                                    </td>

                                    <td>

                                        <?php if ($exp['status'] == 1) { ?>

                                            <span class="badge bg-success">
                                                Active
                                            </span>

                                        <?php } else { ?>

                                            <span class="badge bg-secondary">
                                                Hidden
                                            </span>

                                        <?php } ?>

                                    </td>

                                    <td class="text-end">

                                        <a
                                            href="experience-edit.php?id=<?= $exp['id'] ?>"
                                            class="btn btn-sm btn-outline-primary"
                                        >
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <a
                                            href="experience-delete.php?id=<?= $exp['id'] ?>"
                                            class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Delete this experience record?')"
                                        >
                                            <i class="bi bi-trash"></i>
                                        </a>

                                    </td>

                                </tr>

                            <?php } ?>

                        </tbody>

                    </table>

                </div>

            <?php } else { ?>

                <div class="text-center py-5">

                    <i class="bi bi-briefcase fs-1 text-muted"></i>

                    <p class="text-muted mt-3 mb-0">
                        No professional experience has been added yet.
                    </p>

                </div>

            <?php } ?>

        </div>

    </div>



    <!-- ============================== -->
    <!-- SKILLS -->
    <!-- ============================== -->

    <div class="card shadow-sm border-0 mb-4">

        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">

            <div>

                <h3 class="h5 mb-1">
                    <i class="bi bi-tools me-2"></i>
                    Skills
                </h3>

                <p class="text-muted small mb-0">
                    Add technical and professional skills.
                </p>

            </div>


            <a
                href="skill-add.php"
                class="btn btn-primary btn-sm"
            >

                <i class="bi bi-plus-lg me-1"></i>

                Add Skill

            </a>

        </div>


        <div class="card-body">

            <?php if (mysqli_num_rows($skills) > 0) { ?>

                <div class="row g-3">

                    <?php while ($skill = mysqli_fetch_assoc($skills)) { ?>

                        <div class="col-md-6 col-lg-4">

                            <div class="border rounded p-3 h-100">

                                <div class="d-flex justify-content-between align-items-start">

                                    <div>

                                        <h6 class="mb-1">
                                            <?= htmlspecialchars($skill['title']) ?>
                                        </h6>

                                        <small class="text-muted">
                                            <?= htmlspecialchars($skill['category'] ?? 'Professional Skill') ?>
                                        </small>

                                    </div>


                                    <div>

                                        <a
                                            href="skill-edit.php?id=<?= $skill['id'] ?>"
                                            class="btn btn-sm btn-outline-primary"
                                        >
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <a
                                            href="skill-delete.php?id=<?= $skill['id'] ?>"
                                            class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Delete this skill?')"
                                        >
                                            <i class="bi bi-trash"></i>
                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    <?php } ?>

                </div>

            <?php } else { ?>

                <div class="text-center py-4">

                    <i class="bi bi-tools fs-1 text-muted"></i>

                    <p class="text-muted mt-3 mb-0">
                        No skills have been added yet.
                    </p>

                </div>

            <?php } ?>

        </div>

    </div>



    <!-- ============================== -->
    <!-- CERTIFICATIONS -->
    <!-- ============================== -->

    <div class="card shadow-sm border-0 mb-4">

        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">

            <div>

                <h3 class="h5 mb-1">
                    <i class="bi bi-patch-check me-2"></i>
                    Certifications
                </h3>

                <p class="text-muted small mb-0">
                    Manage your professional certifications.
                </p>

            </div>


            <a
                href="certification-add.php"
                class="btn btn-primary btn-sm"
            >

                <i class="bi bi-plus-lg me-1"></i>

                Add Certification

            </a>

        </div>


        <div class="card-body p-0">

            <?php if (mysqli_num_rows($certifications) > 0) { ?>

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">

                            <tr>

                                <th>Certification</th>

                                <th>Organization</th>

                                <th>Year</th>

                                <th>Actions</th>

                            </tr>

                        </thead>


                        <tbody>

                            <?php while ($cert = mysqli_fetch_assoc($certifications)) { ?>

                                <tr>

                                    <td>
                                        <strong>
                                            <?= htmlspecialchars($cert['title']) ?>
                                        </strong>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($cert['issuer']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($cert['issue_date']) ?>
                                    </td>

                                    <td>

                                        <a
                                            href="certification-edit.php?id=<?= $cert['id'] ?>"
                                            class="btn btn-sm btn-outline-primary"
                                        >
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <a
                                            href="certification-delete.php?id=<?= $cert['id'] ?>"
                                            class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Delete this certification?')"
                                        >
                                            <i class="bi bi-trash"></i>
                                        </a>

                                    </td>

                                </tr>

                            <?php } ?>

                        </tbody>

                    </table>

                </div>

            <?php } else { ?>

                <div class="text-center py-4">

                    <i class="bi bi-patch-check fs-1 text-muted"></i>

                    <p class="text-muted mt-3 mb-0">
                        No certifications have been added yet.
                    </p>

                </div>

            <?php } ?>

        </div>

    </div>



    <!-- ============================== -->
    <!-- LANGUAGES -->
    <!-- ============================== -->

    <div class="card shadow-sm border-0 mb-4">

        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">

            <div>

                <h3 class="h5 mb-1">
                    <i class="bi bi-translate me-2"></i>
                    Languages
                </h3>

                <p class="text-muted small mb-0">
                    Manage languages and proficiency levels.
                </p>

            </div>


            <a
                href="language-add.php"
                class="btn btn-primary btn-sm"
            >

                <i class="bi bi-plus-lg me-1"></i>

                Add Language

            </a>

        </div>


        <div class="card-body">

            <?php if (mysqli_num_rows($languages) > 0) { ?>

                <div class="row g-3">

                    <?php while ($language = mysqli_fetch_assoc($languages)) { ?>

                        <div class="col-md-6">

                            <div class="border rounded p-3">

                                <div class="d-flex justify-content-between">

                                    <div>

                                        <h6 class="mb-1">
                                            <?= htmlspecialchars($language['name']) ?>
                                        </h6>

                                        <span class="text-muted">
                                            <?= htmlspecialchars($language['proficiency']) ?>
                                        </span>

                                    </div>


                                    <div>

                                        <a
                                            href="language-edit.php?id=<?= $language['id'] ?>"
                                            class="btn btn-sm btn-outline-primary"
                                        >
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <a
                                            href="language-delete.php?id=<?= $language['id'] ?>"
                                            class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Delete this language?')"
                                        >
                                            <i class="bi bi-trash"></i>
                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    <?php } ?>

                </div>

            <?php } else { ?>

                <div class="text-center py-4">

                    <i class="bi bi-translate fs-1 text-muted"></i>

                    <p class="text-muted mt-3 mb-0">
                        No languages have been added yet.
                    </p>

                </div>

            <?php } ?>

        </div>

    </div>



    <!-- ============================== -->
    <!-- INTERESTS -->
    <!-- ============================== -->

    <div class="card shadow-sm border-0 mb-4">

        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">

            <div>

                <h3 class="h5 mb-1">
                    <i class="bi bi-heart me-2"></i>
                    Interests
                </h3>

                <p class="text-muted small mb-0">
                    Add your professional and personal interests.
                </p>

            </div>


            <a
                href="interest-add.php"
                class="btn btn-primary btn-sm"
            >

                <i class="bi bi-plus-lg me-1"></i>

                Add Interest

            </a>

        </div>


        <div class="card-body">

            <?php if (mysqli_num_rows($interests) > 0) { ?>

                <div class="row g-3">

                    <?php while ($interest = mysqli_fetch_assoc($interests)) { ?>

                        <div class="col-md-4 col-lg-3">

                            <div class="border rounded p-3 text-center">

                                <i class="bi bi-star fs-4 d-block mb-2"></i>

                                <h6 class="mb-2">
                                    <?= htmlspecialchars($interest['name']) ?>
                                </h6>


                                <div>

                                    <a
                                        href="interest-edit.php?id=<?= $interest['id'] ?>"
                                        class="btn btn-sm btn-outline-primary"
                                    >
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <a
                                        href="interest-delete.php?id=<?= $interest['id'] ?>"
                                        class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Delete this interest?')"
                                    >
                                        <i class="bi bi-trash"></i>
                                    </a>

                                </div>

                            </div>

                        </div>

                    <?php } ?>

                </div>

            <?php } else { ?>

                <div class="text-center py-4">

                    <i class="bi bi-heart fs-1 text-muted"></i>

                    <p class="text-muted mt-3 mb-0">
                        No interests have been added yet.
                    </p>

                </div>

            <?php } ?>

        </div>

    </div>



    <!-- ============================== -->
    <!-- AWARDS / ACHIEVEMENTS -->
    <!-- ============================== -->

    <div class="card shadow-sm border-0 mb-4">

        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">

            <div>

                <h3 class="h5 mb-1">
                    <i class="bi bi-trophy me-2"></i>
                    Awards & Achievements
                </h3>

                <p class="text-muted small mb-0">
                    Manage awards, achievements and recognitions.
                </p>

            </div>


            <a
                href="award-add.php"
                class="btn btn-primary btn-sm"
            >

                <i class="bi bi-plus-lg me-1"></i>

                Add Achievement

            </a>

        </div>


        <div class="card-body p-0">

            <?php if (mysqli_num_rows($awards) > 0) { ?>

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">

                            <tr>

                                <th>Achievement</th>

                                <th>Organization</th>

                                <th>Year</th>

                                <th>Description</th>

                                <th>Actions</th>

                            </tr>

                        </thead>


                        <tbody>

                            <?php while ($award = mysqli_fetch_assoc($awards)) { ?>

                                <tr>

                                    <td>
                                        <strong>
                                            <?= htmlspecialchars($award['title']) ?>
                                        </strong>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($award['organization']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($award['year']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($award['description']) ?>
                                    </td>

                                    <td>

                                        <a
                                            href="award-edit.php?id=<?= $award['id'] ?>"
                                            class="btn btn-sm btn-outline-primary"
                                        >
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <a
                                            href="award-delete.php?id=<?= $award['id'] ?>"
                                            class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Delete this achievement?')"
                                        >
                                            <i class="bi bi-trash"></i>
                                        </a>

                                    </td>

                                </tr>

                            <?php } ?>

                        </tbody>

                    </table>

                </div>

            <?php } else { ?>

                <div class="text-center py-4">

                    <i class="bi bi-trophy fs-1 text-muted"></i>

                    <p class="text-muted mt-3 mb-0">
                        No awards or achievements have been added yet.
                    </p>

                </div>

            <?php } ?>

        </div>

    </div>



    <!-- ============================== -->
    <!-- REFEREES -->
    <!-- ============================== -->

    <div class="card shadow-sm border-0 mb-4">

        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">

            <div>

                <h3 class="h5 mb-1">
                    <i class="bi bi-person-lines-fill me-2"></i>
                    Referees
                </h3>

                <p class="text-muted small mb-0">
                    Manage professional referees displayed on your resume.
                </p>

            </div>


            <a
                href="referee-add.php"
                class="btn btn-primary btn-sm"
            >

                <i class="bi bi-plus-lg me-1"></i>

                Add Referee

            </a>

        </div>


        <div class="card-body">

            <?php if (mysqli_num_rows($referees) > 0) { ?>

                <div class="row g-3">

                    <?php while ($ref = mysqli_fetch_assoc($referees)) { ?>

                        <div class="col-md-6">

                            <div class="border rounded p-4 h-100">

                                <div class="d-flex justify-content-between">

                                    <div>

                                        <h5 class="mb-1">
                                            <?= htmlspecialchars($ref['name']) ?>
                                        </h5>

                                        <p class="text-muted mb-2">
                                            <?= htmlspecialchars($ref['position']) ?>
                                        </p>

                                    </div>

                                    <i class="bi bi-person-badge fs-3"></i>

                                </div>


                                <hr>


                                <p class="mb-2">

                                    <i class="bi bi-building me-2"></i>

                                    <?= htmlspecialchars($ref['organization']) ?>

                                </p>


                                <p class="mb-2">

                                    <i class="bi bi-telephone me-2"></i>

                                    <?= htmlspecialchars($ref['phone']) ?>

                                </p>


                                <p class="mb-3">

                                    <i class="bi bi-envelope me-2"></i>

                                    <?= htmlspecialchars($ref['email']) ?>

                                </p>


                                <div>

                                    <a
                                        href="referee-edit.php?id=<?= $ref['id'] ?>"
                                        class="btn btn-sm btn-outline-primary"
                                    >

                                        <i class="bi bi-pencil me-1"></i>

                                        Edit

                                    </a>


                                    <a
                                        href="referee-delete.php?id=<?= $ref['id'] ?>"
                                        class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Delete this referee?')"
                                    >

                                        <i class="bi bi-trash me-1"></i>

                                        Delete

                                    </a>

                                </div>

                            </div>

                        </div>

                    <?php } ?>

                </div>

            <?php } else { ?>

                <div class="text-center py-4">

                    <i class="bi bi-person-lines-fill fs-1 text-muted"></i>

                    <p class="text-muted mt-3 mb-0">
                        No referees have been added yet.
                    </p>

                </div>

            <?php } ?>

        </div>

    </div>



    <!-- ============================== -->
    <!-- RESUME PREVIEW -->
    <!-- ============================== -->

    <div class="card shadow-sm border-0">

        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h5 class="mb-1">
                        <i class="bi bi-eye me-2"></i>
                        Resume Preview
                    </h5>

                    <p class="text-muted small mb-0">
                        View how your resume appears on the public website.
                    </p>

                </div>


                <a
                    href="../resume.php"
                    target="_blank"
                    class="btn btn-outline-primary"
                >

                    <i class="bi bi-box-arrow-up-right me-1"></i>

                    View Resume

                </a>

            </div>

        </div>

    </div>

</div>


<?php

include "footer.php";

?>