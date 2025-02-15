<?php
$topdir = "../../..";
$title = "MPI_Publish_name(3) man page (version 4.1.2)";
$meta_desc = "Open MPI v4.1.2 man page: MPI_PUBLISH_NAME(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
      <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<p>
<h2><a name='sect0' href='#toc0'>Name</a></h2>
<br>
<pre>MPI_Publish_name - Publishes a service name associated with a port
</pre>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<p>
<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Publish_name(const char *service_name, MPI_Info info,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const char *port_name)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>USE MPI
! or the older form: INCLUDE &rsquo;mpif.h&rsquo;
MPI_PUBLISH_NAME(SERVICE_NAME, INFO, PORT_NAME, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;CHARACTER*(*)<tt> </tt>&nbsp;<tt> </tt>&nbsp;SERVICE_NAME, PORT_NAME
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;INFO, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>Fortran 2008 Syntax</a></h2>
<br>
<pre>USE mpi_f08
MPI_Publish_name(service_name, info, port_name, ierror)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;TYPE(MPI_Info), INTENT(IN) :: info
<tt> </tt>&nbsp;<tt> </tt>&nbsp;CHARACTER(LEN=*), INTENT(IN) :: service_name, port_name
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER, OPTIONAL, INTENT(OUT) :: ierror
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>service_name </dt>
<dd>A service name (string). </dd>

<dt>info </dt>
<dd>Options to the
name service functions (handle). </dd>

<dt>port_name </dt>
<dd>A port name (string).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output
Parameter</a></h2>

<dl>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
This routine
publishes the pair (<i>service_name, port_name</i>) so that an application may
retrieve <i>port_name</i> by calling <a href="../man3/MPI_Lookup_name.3.php">MPI_Lookup_name</a> with <i>service_name</i> as an argument.
It is an error to publish the same <i>service_name</i> twice, or to use a <i>port_name</i>
argument that was not previously opened by the calling process via a call
to <a href="../man3/MPI_Open_port.3.php">MPI_Open_port</a>.
<p>
<h2><a name='sect8' href='#toc8'>Info Arguments</a></h2>
The following keys for <i>info</i> are recognized:
<p>
<p>
<br>
<pre>Key                   Type      Description
---                   ----      -----------
ompi_global_scope     bool      If set to true, publish the name in
                                the global scope.  Publish in the local
                                scope otherwise.  See the NAME SCOPE
                                section for more details.
ompi_unique           bool      If set to true, return an error if the
                                specified service_name already exists.
                                Default to overwriting any pre-existing
                                value.
</pre>
<p> <p>
<i>bool</i> info keys are actually strings but are evaluated as follows: if the
string value is a number, it is converted to an integer and cast to a boolean
(meaning that zero integers are false and non-zero values are true).  If
the string value is (case-insensitive) "yes" or "true", the boolean is true.
 If the string value is (case-insensitive) "no" or "false", the boolean
is false.  All other string values are unrecognized, and therefore false.
<p>
If no info key is provided, the function will first check to see if a global
server has been specified and is available. If so, then the publish function
will default to global scope first, followed by local. Otherwise, the data
will default to publish with local scope.
<p>
<h2><a name='sect9' href='#toc9'>Name Scope</a></h2>
Open MPI supports two
name scopes: <i>global</i> and <i>local</i>. Local scope will place the specified service/port
pair in a data store located on the mpirun of the calling process&rsquo; job. Thus,
data published with local scope will only be accessible to processes in
jobs spawned by that mpirun - e.g., processes in the calling process&rsquo; job,
or in jobs spawned via <a href="../man3/MPI_Comm_spawn.3.php">MPI_Comm_spawn</a>. <p>
Global scope places the specified
service/port pair in a data store located on a central server that is accessible
to all jobs running in the cluster or environment. Thus, data published
with global scope can be accessed by multiple mpiruns and used for <a href="../man3/MPI_Comm_connect.3.php">MPI_Comm_Connect</a>
and <a href="../man3/MPI_Comm_accept.3.php">MPI_Comm_accept</a> between jobs. <p>
Note that global scope operations require
both the presence of the central server and that the calling process be
able to communicate to that server. MPI_Publish_name will return an error
if global scope is specified and a global server is either not specified
or cannot be found. <p>
Open MPI provides a server called <i>ompi-server</i> to support
global scope operations. Please refer to its manual page for a more detailed
description of data store/lookup operations. <p>
As an example of the impact
of these scoping rules, consider the case where a job has been started
with mpirun - call this job "job1". A process in job1 creates and publishes
a service/port pair using a local scope. Open MPI will store this data in
the data store within mpirun. <p>
A process in job1 (perhaps the same as did
the publish, or perhaps some other process in the job) subsequently calls
<a href="../man3/MPI_Comm_spawn.3.php">MPI_Comm_spawn</a> to start another job (call it "job2") under this mpirun.
Since the two jobs share a common mpirun, both jobs have access to local
scope data. Hence, a process in job2 can perform an <a href="../man3/MPI_Lookup_name.3.php">MPI_Lookup_name</a> with
a local scope to retrieve the information. <p>
However, assume another user
starts a job using mpirun - call this job "job3". Because the service/port
data published by job1 specified local scope, processes in job3 cannot
access that data. In contrast, if the data had been published using global
scope, then any process in job3 could access the data, provided that mpirun
was given knowledge of how to contact the central server and the process
could establish communication with it.
<p>
<h2><a name='sect10' href='#toc10'>Errors</a></h2>
Almost all MPI routines return
an error value; C routines as the value of the function and Fortran routines
in the last argument. C++ functions do not return errors. If the default
error handler is set to MPI::ERRORS_THROW_EXCEPTIONS, then on error the
C++ exception mechanism will be used to throw an MPI::Exception object.
<p>
Before the error value is returned, the current MPI error handler is called.
By default, this error handler aborts the MPI job, except for I/O function
errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>; the
predefined error handler MPI_ERRORS_RETURN may be used to cause error values
to be returned. Note that MPI does not guarantee that an MPI program can
continue past an error. <p>
See the MPI man page for a full list of MPI error
codes.
<p>
<h2><a name='sect11' href='#toc11'>See Also</a></h2>
<br>
<pre><a href="../man3/MPI_Lookup_name.3.php">MPI_Lookup_name</a>
<a href="../man3/MPI_Open_port.3.php">MPI_Open_port</a>

<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
