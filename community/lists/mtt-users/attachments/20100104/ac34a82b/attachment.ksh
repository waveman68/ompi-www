#
# Copyright (c) 2006-2009 Cisco Systems, Inc.  All rights reserved.
#
# Note that there are many items in this file that, while they are
# good for examples, may not work for random MTT users.  For example,
# the "ompi-tests" SVN repository that is used in the examples below
# is *not* a public repository (there's nothing really secret in this
# repository; it contains many publicly-available MPI tests and
# benchmarks, but we have never looked into the redistribution rights
# of these codes, so we keep the SVN repository "closed" to the
# general public and only use it internally in the Open MPI project).

#======================================================================
# Generic OMPI core performance testing template configuration
#======================================================================

[MTT]
# Leave this string so that we can identify this data subset in the
# database
# OMPI Core: Use a "test" label until we're ready to run real results
description = [testbake]
# description = [2007 collective performance bakeoff]
# OMPI Core: Use the "trial" flag until we're ready to run real results
trial = 1

# Put other values here as relevant to your environment.

#----------------------------------------------------------------------

[Lock]
# Put values here as relevant to your environment.

#======================================================================
# MPI get phase
#======================================================================

[MPI get: ompi-nightly-trunk]
mpi_details = OMPI

module = OMPI_Snapshot
ompi_snapshot_url = http://www.open-mpi.org/nightly/trunk

#----------------------------------------------------------------------

[MPI get: ompi-nightly-v1.2]
mpi_details = OMPI

module = OMPI_Snapshot
ompi_snapshot_url = http://www.open-mpi.org/nightly/v1.2

#----------------------------------------------------------------------

[MPI get: ompi-released-v1.2]
mpi_details = OMPI

module = OMPI_Snapshot
ompi_snapshot_url = http://www.open-mpi.org/software/ompi/v1.2/downloads

#----------------------------------------------------------------------

[MPI get: MPICH1]
mpi_details = MPICH1

module = Download
# MPICH1 from the Argonne web site
#download_url = http://www-unix.mcs.anl.gov/mpi/mpich1/downloads/mpich.tar.gz
# If you are using SLURM, use this URL -- it's the same exact
# mpich.tar.gz but with the SLURM 1.2.12/etc/mpich1.slurm.patch in it
# (which allows native launching under SLURM).
download_url = http://www.open-mpi.org/~jsquyres/ompi-coll-bakeoff/mpich-1.2.7p1-patched-for-slurm.tar.gz
# This version is fixed/frozen, so it's ok to hard-code it
download_version = 1.2.7p1

#----------------------------------------------------------------------

[MPI get: MPICH-MX]
mpi_details = MPICH-MX

module = Download
download_url = http://www.myri.com/ftp/pub/MPICH-MX/mpich-mx_1.2.7..5.tar.gz
# You need to obtain the username and password from Myricom
download_username = <OBTAIN THIS FROM MYRICOM>
download_password = <OBTAIN THIS FROM MYRICOM>

#----------------------------------------------------------------------

[MPI get: MPICH2]
mpi_details = MPICH2

module = Download
download_url = http://www-unix.mcs.anl.gov/mpi/mpich2/downloads/mpich2-1.0.5p4.tar.gz

#----------------------------------------------------------------------

[MPI get: MVAPICH1]
mpi_details = MVAPICH1

module = Download
download_url = http://mvapich.cse.ohio-state.edu/download/mvapich/mvapich-0.9.9.tar.gz

#----------------------------------------------------------------------

[MPI get: MVAPICH2]
mpi_details = MVAPICH2

module = Download
download_url = http://mvapich.cse.ohio-state.edu/download/mvapich2/mvapich2-0.9.8p3.tar.gz

#----------------------------------------------------------------------

[MPI get: HP MPI]
mpi_details = HP MPI

# You need to have HP MPI already installed somewhere
module = AlreadyInstalled
# Fill this in with the version of your HP MPI
alreadyinstalled_version = 2.2.5.1b1

#----------------------------------------------------------------------

[MPI get: Intel MPI]
mpi_details = Intel MPI

# You need to have Intel MPI already installed somewhere
module = AlreadyInstalled
# Fill this in with the version of your Intel MPI
alreadyinstalled_version = 3.0

#----------------------------------------------------------------------

[SKIP MPI get: Scali MPI]
mpi_details = Scali MPI

# You need to have Scali MPI already installed somewhere
module = AlreadyInstalled
# Fill this in with the version of your Scali MPI
alreadyinstalled_version = ???

#----------------------------------------------------------------------

[SKIP MPI get: Cray MPI]
mpi_details = Cray MPI

# You need to have Cray MPI already installed somewhere
module = AlreadyInstalled
# Fill this in with the version of your Cray MPI
alreadyinstalled_version = ???

#======================================================================
# Install MPI phase
#======================================================================

# All flavors of Open MPI
[MPI install: OMPI/GNU-standard]
mpi_get = ompi-nightly-trunk, ompi-nightly-v1.2, ompi-released-v1.2
save_stdout_on_success = 1
merge_stdout_stderr = 0

module = OMPI
ompi_make_all_arguments = -j 8
ompi_compiler_name = gnu
ompi_compiler_version = &get_gcc_version()
# Adjust these configure flags for your site
ompi_configure_arguments = CFLAGS=-O3 --with-openib --enable-mpirun-prefix-by-default --enable-branch-probabilities --disable-heterogeneous --without-mpi-param-check

#----------------------------------------------------------------------

[MPI install: MPICH1]
mpi_get = mpich1
save_stdout_on_success = 1
merge_stdout_stderr = 0
# Ensure that MPICH allocates enough shared memory (32MB seems to be
# enough for ppn=4; went to 64MB to give it plenty of room)
setenv = P4_GLOBMEMSIZE 67108864

module = MPICH2
mpich2_use_all_target = 0
mpich2_apply_slurm_patch = 1
mpich2_compiler_name = gnu
mpich2_compiler_version = &get_gcc_version()
mpich2_configure_arguments = -cflags=-O3 -rsh=ssh --with-device=ch_p4 --with-comm=shared

#----------------------------------------------------------------------

[MPI install: MPICH2]
mpi_get = mpich2
save_stdout_on_success = 1
merge_stdout_stderr = 0
# Adjust this for your site (this is what works at Cisco).  Needed to
# launch in SLURM; adding this to LD_LIBRARY_PATH here propagates this
# all the way through the test run phases that use this MPI install,
# where the test executables will need to have this set.
prepend_path = LD_LIBRARY_PATH /opt/slurm/current/lib

module = MPICH2
mpich2_compiler_name = gnu
mpich2_compiler_version = &get_gcc_version()
mpich2_configure_arguments = --disable-f90 CFLAGS=-O3 --enable-fast --with-device=ch3:nemesis
# These are needed to launch through SLURM; adjust as appropriate.
mpich2_additional_wrapper_ldflags = -L/opt/slurm/current/lib
mpich2_additional_wrapper_libs = -lpmi

#----------------------------------------------------------------------

[MPI install: MVAPICH1]
mpi_get = mvapich1
save_stdout_on_success = 1
merge_stdout_stderr = 0
# Setting this makes MVAPICH assume that the same HCAs are on all
# hosts and therefore it makes some optimizations
setenv = VIADEV_USE_COMPAT_MODE 0

module = MVAPICH2
# Adjust this to be where your OFED is installed
mvapich2_setenv = IBHOME /usr
# Leave this set (COMPAT); if you don't, their script asks questions,
# causing MTT to hang
mvapich2_setenv = COMPAT AUTO_DETECT
mvapich2_build_script = make.mvapich.gen2
mvapich2_compiler_name = gnu
mvapich2_compiler_version = &get_gcc_version()

#----------------------------------------------------------------------

[MPI install: MVAPICH2]
mpi_get = mvapich2
save_stdout_on_success = 1
merge_stdout_stderr = 0
# Adjust this for your site (this is what works at Cisco).  Needed to
# launch in SLURM; adding this to LD_LIBRARY_PATH here propagates this
# all the way through the test run phases that use this MPI install,
# where the test executables will need to have this set.
prepend_path = LD_LIBRARY_PATH /opt/slurm/current/lib

module = MVAPICH2
# Adjust this to be where your OFED is installed
mvapich2_setenv = OPEN_IB_HOME /usr
mvapich2_build_script = make.mvapich2.ofa
mvapich2_compiler_name = gnu
mvapich2_compiler_version = &get_gcc_version()
# These are needed to launch through SLURM; adjust as appropriate.
mvapich2_additional_wrapper_ldflags = -L/opt/slurm/current/lib
mvapich2_additional_wrapper_libs = -lpmi

#----------------------------------------------------------------------

[MPI install: Intel MPI]
mpi_get = Intel MPI
# Adjust this if you need to.  It guarantees that multiple MPD's
# running on the same host will not collide.  If you'll ever have
# multi-job-on-the-same-host conflicts, you may want to adjust this to
# reflect some unique identifier (e.g., a resource manager ID).
setenv = MPD_CON_EXT mtt-unique-mpd.&getenv("SLURM_JOBID")

module = Analyze::IntelMPI

#----------------------------------------------------------------------

[MPI install: HP MPI]
mpi_get = HP MPI

module = Analyze::HPMPI

#======================================================================
# MPI run details
#======================================================================

[MPI Details: OMPI]
# Check &test_alloc() for byslot or bynode
exec = mpirun @alloc@ -np &test_np() @mca@ &test_executable() &test_argv()
parameters = &MPI::OMPI::find_mpirun_params(&test_command_line(), \
                                            &test_executable())
network = &MPI::OMPI::find_network(&test_command_line(), &test_executable())

alloc = &if(&eq(&test_alloc(), "node"), "--bynode", "--byslot")
mca = &enumerate( \
        "--mca btl sm,tcp,self " . @common_params@, \
        "--mca btl tcp,self " . @common_params@, \
        "--mca btl sm,openib,self " . @common_params@, \
        "--mca btl sm,openib,self --mca mpi_leave_pinned 1 " . @common_params@, \
        "--mca btl openib,self " . @common_params@, \
        "--mca btl openib,self --mca mpi_leave_pinned 1 " . @common_params@, \
        "--mca btl openib,self --mca mpi_leave_pinned_pipeline 1 " . @common_params@, \
        "--mca btl openib,self --mca btl_openib_use_srq 1 " . @common_params@)

# v1.2 has a problem with striping across heterogeneous ports right now: 
# https://svn.open-mpi.org/trac/ompi/ticket/1125.  Also keep the coll
# bakeoff tests on DDR only.
common_params = "--mca btl_tcp_if_include ib0 --mca oob_tcp_if_include ib0 --mca btl_openib_if_include mthca0 --mca mpi_paffinity_alone 1" . \
        &if(&or(&eq(&mpi_get_name(), "ompi-nightly-v1.2"), \
                &eq(&mpi_get_name(), "ompi-released-v1.2")), \
                "--mca btl_openib_max_btls 1", "")

# It is important that the after_each_exec step is a single
# command/line so that MTT will launch it directly (instead of via a
# temporary script).  This is because the "srun" command is
# (intentionally) difficult to kill in some cases.  See
# https://svn.open-mpi.org/trac/mtt/changeset/657 for details.

after_each_exec = &if(&ne("", &getenv("SLURM_NNODES")), "srun -N " . &getenv("SLURM_NNODES")) /home/mpiteam/svn/ompi-tests/cisco/mtt/after_each_exec.pl

#----------------------------------------------------------------------

[MPI Details: MPICH1]

# Launching through SLURM.  From
# http://www.llnl.gov/linux/slurm/quickstart.html.
exec = srun @alloc@ -n &test_np() --mpi=mpich1_p4 &test_executable() &test_argv()

# If not using SLURM, you'll need something like this (not tested).
# You may need different hostfiles for running by slot/by node.
#exec = mpirun -np &test_np() -machinefile &hostfile() &test_executable()

network = loopback,ethernet

# In this SLURM example, if each node has 4 CPUs, telling SLURM to
# launching "by node" means specifying that each MPI process will use 4
# CPUs.
alloc = &if(&eq(&test_alloc(), "node"), "-c 4", "")

#----------------------------------------------------------------------

[MPI Details: MPICH2]

# Launching through SLURM.  If you use mpdboot instead, you need to
# ensure that multiple mpd's on the same node don't conflict (or never
# happen).
exec = srun @alloc@ -n &test_np() &test_executable() &test_argv()

# If not using SLURM, you'll need something like this (not tested).
# You may need different hostfiles for running by slot/by node.
#exec = mpiexec -np &test_np() --host &hostlist() &test_executable()

network = loopback,ethernet,shmem

# In this SLURM example, if each node has 4 CPUs, telling SLURM to
# launching "by node" means specifying that each MPI process will use 4
# CPUs.
alloc = &if(&eq(&test_alloc(), "node"), "-c 4", "")

#----------------------------------------------------------------------

[MPI Details: MVAPICH1]

# Launching through SLURM.  From
# http://www.llnl.gov/linux/slurm/quickstart.html.
exec = srun @alloc@ -n &test_np() --mpi=mvapich &test_executable() &test_argv()

# If not using SLURM, you'll need something like this (not tested).
# You may need different hostfiles for running by slot/by node.
#exec = mpirun -np &test_np() --machinefile &hostfile() &test_executable()

network = loopback,verbs,shmem

# In this example, each node has 4 CPUs, so to launch "by node", just
# specify that each MPI process will use 4 CPUs.
alloc = &if(&eq(&test_alloc(), "node"), "-c 4", "")

#----------------------------------------------------------------------

[MPI Details: MVAPICH2]

# Launching through SLURM.  If you use mpdboot instead, you need to
# ensure that multiple mpd's on the same node don't conflict (or never
# happen).
exec = srun @alloc@ -n &test_np() &test_executable() &test_argv()

# If not using SLURM, you'll need something like this (not tested).
# You may need different hostfiles for running by slot/by node.
#exec = mpiexec -np &test_np() --host &hostlist() &test_executable()

network = loopback,verbs,shmem

# In this example, each node has 4 CPUs, so to launch "by node", just
# specify that each MPI process will use 4 CPUs.
alloc = &if(&eq(&test_alloc(), "node"), "-c 4", "")

#----------------------------------------------------------------------

[MPI Details: MPICH-MX]

# Launching through SLURM.  From
# http://www.llnl.gov/linux/slurm/quickstart.html.
exec = srun @alloc@ -n &test_np() --mpi=mpichgm &test_executable() &test_argv()
network = mx

# If not using SLURM, you'll need something like this (not tested).
# You may need different hostfiles for running by slot/by node.
#exec = mpirun -np &test_np() --machinefile &hostfile() &test_executable()

# In this example, each node has 4 CPUs, so to launch "by node", just
# specify that each MPI process will use 4 CPUs.
alloc = &if(&eq(&test_alloc(), "node"), "-c 4", "")

#----------------------------------------------------------------------

[MPI Details: Intel MPI]

# Need a before_any_exec step to launch MPDs
before_any_exec = <<EOF
h=`hostname`
file=mtt-hostlist.$$
rm -f $file
# If we're allocating by node, get each hostname once.  Otherwise, get
# each hostname as many times as we have slots on that node.
srun hostname | uniq > $file
# Add localhost if it's not in there (e.g., srun -A)
local=`grep $h $file`
touch /tmp/mtt-mpiexec-options.$SLURM_JOBID
if test "$local" = ""; then
   echo $h >> $file
   echo -nolocal > /tmp/mpiexec-options.$SLURM_JOBID
fi
num=`wc -l $file | awk '{ print $1 }'`
mpdboot -n $num -r ssh --verbose --file=$file
mpdtrace
rm -f $file
EOF

# Intel MPI seems to default to by-node allocation and I can't figure
# out how to override it.  Sigh.
exec = mpiexec @options@ -n &test_np() ./&test_executable() &test_argv()
network = loopback,verbs,shmem

# Test both the "normal" collective algorithms and Intel's "fast"
# collective algorithms (their docs state that the "fast" algorithms
# may not be MPI conformant, and may not give the same results between
# multiple runs, assumedly if the process layout is different).
options = &stringify(&cat("/tmp/mpiexec-options." . &getenv("SLURM_JOBID"))) \
          &enumerate("-genv I_MPI_DEVICE rdssm", \
                     "-genv I_MPI_DEVICE rdssm -genv I_MPI_FAST_COLLECTIVES 1")

after_all_exec = <<EOT
rm -f /tmp/mpiexec-options.$SLURM_JOBID
mpdallexit
EOT

#----------------------------------------------------------------------

[MPI Details: HP MPI]

# I use MPI_IBV_NO_FORK_SAFE=1 because I'm using RHEL4U4, which
# doesn't have IBV fork() support.  I also have multiple active HCA
# ports and therefore need to give HP MPI a clue on the scheduling of
# ports via MPI_IB_CARD_ORDER.  I got this information via e-mailing
# HP MPI support.
#
# In SLURM, HP MPI seems to schedule first by node and then by slot.
# So if you have 2 quad-core nodes in your SLURM alloc, if you mpirun
# -np 2, you'll get one proc on each node.  If you mpirun -np 4,
# you'll get MCW ranks 0 and 1 on the first node and MCA ranks 2 and 3
# on the second node.  This is pretty much exactly what we want, so we
# don't need to check &test_alloc() here.
exec = mpirun -IBV -e MPI_IBV_NO_FORK_SAFE=1 -e MPI_IB_CARD_ORDER=0:0 -srun -n&test_np() ./&test_executable() &test_argv()
network = loopback,verbs,shmem

#======================================================================
# Test get phase
#======================================================================

[Test get: netpipe]
module = Download
download_url = http://www.scl.ameslab.gov/netpipe/code/NetPIPE_3.6.2.tar.gz

#----------------------------------------------------------------------

[Test get: osu]
module = SVN
svn_url = https://svn.open-mpi.org/svn/ompi-tests/trunk/osu

#----------------------------------------------------------------------

[Test get: imb]
module = SVN
svn_url = https://svn.open-mpi.org/svn/ompi-tests/trunk/IMB_2.3

#----------------------------------------------------------------------

[Test get: skampi]
module = SVN
svn_url = https://svn.open-mpi.org/svn/ompi-tests/trunk/skampi-5.0.1

#----------------------------------------------------------------------

[Test get: nbcbench]
module = SVN
svn_url = https://svn.open-mpi.org/svn/ompi-tests/trunk/nbcbench

#======================================================================
# Test build phase
#======================================================================

[Test build: netpipe]
test_get = netpipe
save_stdout_on_success = 1
merge_stdout_stderr = 1
stderr_save_lines = 100

module = Shell
shell_build_command = <<EOT
make mpi
EOT

#----------------------------------------------------------------------

[Test build: osu]
test_get = osu
save_stdout_on_success = 1
merge_stdout_stderr = 1
stderr_save_lines = 100

module = Shell
shell_build_command = <<EOT
make osu_latency osu_bw osu_bibw
EOT

#----------------------------------------------------------------------

[Test build: imb]
test_get = imb
save_stdout_on_success = 1
merge_stdout_stderr = 1

module = Shell
shell_build_command = <<EOT
cd src
make clean IMB-MPI1
EOT

#----------------------------------------------------------------------

[Test build: skampi]
test_get = skampi
save_stdout_on_success = 1
merge_stdout_stderr = 1
stderr_save_lines = 100

module = Shell
# Set EVERYONE_CAN_MPI_IO for HP MPI
shell_build_command = <<EOT
make CFLAGS="-O2 -DPRODUCE_SPARSE_OUTPUT -DEVERYONE_CAN_MPI_IO"
EOT

#----------------------------------------------------------------------

[Test build: nbcbench]
test_get = nbcbench
save_stdout_on_success = 1
merge_stdout_stderr = 1
stderr_save_lines = 100

module = Shell
shell_build_command = <<EOT
make
EOT

#======================================================================
# Test Run phase
#======================================================================

[Test run: netpipe]
test_build = netpipe
pass = &and(&cmd_wifexited(), &eq(&cmd_wexitstatus(), 0))
# Timeout hueristic: 10 minutes
timeout = 10:00
save_stdout_on_pass = 1
# Ensure to leave this value as "-1", or performance results could be lost!
stdout_save_lines = -1
merge_stdout_stderr = 1
np = 2
alloc = node

specify_module = Simple
analyze_module = NetPipe

simple_pass:tests = NPmpi

#----------------------------------------------------------------------

[Test run: osu]
test_build = osu
pass = &and(&cmd_wifexited(), &eq(&cmd_wexitstatus(), 0))
# Timeout hueristic: 10 minutes
timeout = 10:00
save_stdout_on_pass = 1
# Ensure to leave this value as "-1", or performance results could be lost!
stdout_save_lines = -1
merge_stdout_stderr = 1
np = 2
alloc = node

specify_module = Simple
analyze_module = OSU

simple_pass:tests = osu_bw osu_latency osu_bibw

#----------------------------------------------------------------------

[Test run: imb]
test_build = imb
pass = &and(&cmd_wifexited(), &eq(&cmd_wexitstatus(), 0))
# Timeout hueristic: 10 minutes
timeout = 10:00
save_stdout_on_pass = 1
# Ensure to leave this value as "-1", or performance results could be lost!
stdout_save_lines = -1
merge_stdout_stderr = 1
np = &env_max_procs()

argv = -npmin &test_np() &enumerate("PingPong", "PingPing", "Sendrecv", "Exchange", "Allreduce", "Reduce", "Reduce_scatter", "Allgather", "Allgatherv", "Alltoall", "Bcast", "Barrier") 

specify_module = Simple
analyze_module = IMB

simple_pass:tests = src/IMB-MPI1

#----------------------------------------------------------------------

[Test run: skampi]
test_build = skampi
pass = &and(&cmd_wifexited(), &eq(&cmd_wexitstatus(), 0))
# Timeout hueristic: 10 minutes
timeout = 10:00
save_stdout_on_pass = 1
# Ensure to leave this value as "-1", or performance results could be lost!
stdout_save_lines = -1
merge_stdout_stderr = 1
np = &env_max_procs()

argv = -i &find("mtt_.+.ski", "input_files_bakeoff")

specify_module = Simple
analyze_module = SKaMPI

simple_pass:tests = skampi

#----------------------------------------------------------------------

[Test run: nbcbench]
test_build = nbcbench
pass = &and(&test_wifexited(), &eq(&test_wexitstatus(), 0))
timeout = -1
save_stdout_on_pass = 1
# Ensure to leave this value as "-1", or performance results could be lost!
stdout_save_lines = -1
merge_stdout_stderr = 1

specify_module = Simple
analyze_module = NBCBench
simple_pass:tests = nbcbench

argv = -p &test_np()-&test_np() -s 1-1048576 -v -t \
    &enumerate("MPI_Allgatherv", "MPI_Allgather", "MPI_Allreduce", \
    "MPI_Alltoall", "MPI_Alltoallv", "MPI_Barrier", "MPI_Bcast", \
    "MPI_Gather", "MPI_Gatherv", "MPI_Reduce", "MPI_Reduce_scatter", \
    "MPI_Scan", "MPI_Scatter", "MPI_Scatterv")

#======================================================================
# Reporter phase
#======================================================================

[Reporter: IU database]
module = MTTDatabase

mttdatabase_realm = OMPI
mttdatabase_url = https://www.open-mpi.org/mtt/submit/
# Change this to be the username and password for your submit user.
# Get this from the OMPI MTT administrator.
mttdatabase_username = you must set this value
mttdatabase_password = you must set this value
# Change this to be some short string identifying your cluster.
mttdatabase_platform = you must set this value

mttdatabase_debug_filename = mttdb_debug_file_perf
mttdatabase_keep_debug_files = 1

#----------------------------------------------------------------------

# This is a backup reporter; it also writes results to a local text
# file

[Reporter: text file backup]
module = TextFile

textfile_filename = $phase-$section-$mpi_name-$mpi_version.txt

textfile_summary_header = <<EOT
Hostname: &shell("hostname")
uname: &shell("uname -a")
Username: &shell("who am i")
EOT

textfile_summary_footer =
textfile_detail_header =
textfile_detail_footer =

textfile_textwrap = 78
