<?
$subject_val = "Re: [OMPI users] Connection problem on Linux cluster";
include("../../include/msg-header.inc");
?>
<!-- received="Mon Mar 30 06:13:34 2015" -->
<!-- isoreceived="20150330101334" -->
<!-- sent="Mon, 30 Mar 2015 10:12:57 +0000" -->
<!-- isosent="20150330101257" -->
<!-- name="LOTFIFAR F." -->
<!-- email="foad.lotfifar_at_[hidden]" -->
<!-- subject="Re: [OMPI users] Connection problem on Linux cluster" -->
<!-- id="F28A112937E208429BD09C805E9A1945090EA4BD_at_CISAMRMBS02.mds.ad.dur.ac.uk" -->
<!-- charset="Windows-1252" -->
<!-- inreplyto="5A9DEB4E-EB33-4E10-A147-39730DB624F5_at_open-mpi.org" -->
<!-- expires="-1" -->
<div class="center">
<table border="2" width="100%" class="links">
<tr>
<th><a href="date.php">Date view</a></th>
<th><a href="index.php">Thread view</a></th>
<th><a href="subject.php">Subject view</a></th>
<th><a href="author.php">Author view</a></th>
</tr>
</table>
</div>
<p class="headers">
<strong>Subject:</strong> Re: [OMPI users] Connection problem on Linux cluster<br>
<strong>From:</strong> LOTFIFAR F. (<em>foad.lotfifar_at_[hidden]</em>)<br>
<strong>Date:</strong> 2015-03-30 06:12:57
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="26577.php">Jeff Squyres (jsquyres): "Re: [OMPI users] Connection problem on Linux cluster"</a>
<li><strong>Previous message:</strong> <a href="26575.php">Mike Dubman: "Re: [OMPI users] MPI_THREAD_MULTIPLE and openib btl"</a>
<li><strong>In reply to:</strong> <a href="26572.php">Ralph Castain: "Re: [OMPI users] Connection problem on Linux cluster"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="26577.php">Jeff Squyres (jsquyres): "Re: [OMPI users] Connection problem on Linux cluster"</a>
<li><strong>Reply:</strong> <a href="26577.php">Jeff Squyres (jsquyres): "Re: [OMPI users] Connection problem on Linux cluster"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Thank you very much guys. The problem has just been resolved. The problem was in the security groups rules when one create VMs. Openstack pushes the security groups into iptables rules and it is not necessary to do anything with iptables or firewalls inside VMs. The processes were freezing and I could not get any further debug information. Actually when I left the processes for few hours, I could finally get the error for tcp connection. I think I could fine tune openmpi to reduce this time? 

Thank you very much for you help and information.

Karos

________________________________________
From: users [users-bounces_at_[hidden]] on behalf of Ralph Castain [rhc_at_[hidden]]
Sent: 29 March 2015 17:14
To: Open MPI Users
Subject: Re: [OMPI users] Connection problem on Linux cluster

The port range param differs between the two releases you cited. For the 1.8 release and the OMPI master, the correct MCA param is:

oob_tcp_dynamic_ipv4_ports &lt;range&gt;

Or you can specify the actual, specific ports you want us to use:

oob_tcp_static_ipv4_ports &lt;comma-separated list of ports&gt;

Note that this only controls the &#147;listening&#148; port - the side initiating the connection gets its port from the OS. If we could see what it is doing, then perhaps that would tell us more about the source of the trouble (i.e., maybe the OS doesn&#146;t realize it cannot assign ports outside the domain specified in your security group?). You might have to edit the OS table to tell it to restrict its range of assignable ports, if you haven&#146;t already done so.

Frankly, I&#146;m more disturbed by the inability to get any debug information out of the code. When enabled and with verbosity set, we should get printouts telling us what ports are being tried and why they are failing. The fact that we don&#146;t get *anything* tells me that something we don&#146;t understand is interfering with our debug efforts.

The debug output would be going to stderr - is there anything that would divert that, or block it?


&gt; On Mar 29, 2015, at 5:31 AM, LOTFIFAR F. &lt;foad.lotfifar_at_[hidden]&gt; wrote:
&gt;
&gt; Yes, I have tried installing in home directory which made no difference. You are right Ralph, last night I noticed the same problem. When I launch VMs in openstack web interface, I should assign the VM to a security group. If I do not, Openstack automatically assignes it to a default security group. In this case all traffic is blocked in/out VMs. This is why the traffic is blocked. To sort this out, I have defined my own security group with the following rules:
&gt;
&gt; Ingress       -       TCP     2222            0.0.0.0/0 (CIDR)
&gt; Ingress       -       TCP     22 (SSH)        0.0.0.0/0 (CIDR)
&gt; Ingress       -       TCP     3389 (RDP)      0.0.0.0/0 (CIDR)
&gt; Ingress       -       ICMP    -1 (ALL ICMP)   0.0.0.0/0 (CIDR)
&gt; Ingress       -       TCP     23              0.0.0.0/0 (CIDR)
&gt; Ingress       -       TCP     8080            0.0.0.0/0 (CIDR)
&gt; Ingress       -       TCP     5900            0.0.0.0/0 (CIDR)
&gt; Ingress       -       TCP     111             0.0.0.0/0 (CIDR)
&gt; Ingress       -       UDP     111             0.0.0.0/0 (CIDR)
&gt; Ingress       -       TCP     2049            0.0.0.0/0 (CIDR)
&gt; Ingress       -       UDP     2049            0.0.0.0/0 (CIDR)
&gt; Ingress       -       TCP     1 - 6000        0.0.0.0/0 (CIDR)
&gt; Ingress       -       UDP     1 - 6000        0.0.0.0/0 (CIDR)
&gt;
&gt; the last item opens all TCP ports between 1-6000. I have both iptables and firewall disabled on VMs. running nmap from fehg-node-7 gives the following outputs for ports below/higher than 6000:
&gt;
&gt;&gt; nmap -A fehg-node-0 -p &quot;any port higher than 6000 i.e. 7000&quot;
&gt;
&gt; Nmap scan report for fehg-node-0
&gt; Host is up (0.00062s latency).
&gt; PORT      STATE    SERVICE          VERSION
&gt; 7000/tcp filtered snet-sensor-mgmt
&gt;
&gt; And:
&gt;&gt; nmap -A fehg-node-0 -p &quot;any port less than 6000 i.e. 5000&quot;
&gt; Nmap scan report for fehg-node-0
&gt; Host is up (0.00077s latency).
&gt; PORT     STATE  SERVICE VERSION
&gt; 5000/tcp closed upnp
&gt;
&gt; The first one is correct while I do not know why the second one is not open. I tried to define iptables to allow all traffic from/to VMs in the cluster but it still says the ports are closed!.!!!! which I do not know why????
&gt;
&gt; Of course just opening ports 1-6000 is not a good idea and I just wanted to see the issue.
&gt;
&gt; PS: Another question is about the ports that openmpi uses for mpi communications. As I tried to limit the port range between 1-6000 using mca parameters:
&gt;
&gt; oob_tcp_port_min_v4 = (My minimum port in the range)
&gt; oob_tcp_port_range_v4 = (My port range)
&gt; btl_tcp_port_min_v4 = (My minimum port in the range)
&gt; btl_tcp_port_range_v4 = (My port range)
&gt;
&gt; I noticed that openmpi does not pay attention to these parameters i.e. there is no difference using them? it still uses tcp ports out of the range.
&gt;
&gt; Regards,
&gt; Karos
&gt;
&gt; ________________________________________
&gt; From: users [users-bounces_at_[hidden]] on behalf of Jeff Squyres (jsquyres) [jsquyres_at_[hidden]]
&gt; Sent: 29 March 2015 11:56
&gt; To: Open MPI User's List
&gt; Subject: Re: [OMPI users] Connection problem on Linux cluster
&gt;
&gt; My $0.02:
&gt;
&gt; - building under your $HOME is recommended in cases like this, but it's not going to change the functionality of how OMPI works.  I.e., rebuilding under your $HOME will likely not change the result.
&gt;
&gt; - you have 3 MPI implementations telling you that TCP connections between your VMs doesn't work (OMPI 1.8.x, OMPI 1.6.x, MPICH).  It's therefore likely that there's some kind of TCP blocking going on between your VMs.
&gt;
&gt; - +1 on what Ralph says: you likely need to talk to your sysadmin to get this problem resolved.  iptables and other firewalls may be disabled on your VMs, but OpenStack (or other sysadmin/network admin-controlled entities) *between* your two VMs may be effecting fireballing policies.  This is quite common in cloud environments.
&gt;
&gt; - You can use any TCP ping-pong test to verify TCP connectivity between VMs -- i.e., programs that use random TCP ports to communicate; not the &quot;usual&quot; suspects of ports that OpenStack may leave open by default (22, 80, 443, ...etc.).
&gt;
&gt;
&gt;
&gt;&gt; On Mar 28, 2015, at 7:22 PM, LOTFIFAR F. &lt;foad.lotfifar_at_[hidden]&gt; wrote:
&gt;&gt;
&gt;&gt; I 'll recompile it on the home directory to see how it works.
&gt;&gt;
&gt;&gt; From: users [users-bounces_at_[hidden]] on behalf of Ralph Castain [rhc_at_[hidden]]
&gt;&gt; Sent: 28 March 2015 23:13
&gt;&gt; To: Open MPI Users
&gt;&gt; Subject: Re: [OMPI users] Connection problem on Linux cluster
&gt;&gt;
&gt;&gt; Doug is correct, and we usually suggest you build it under your own home directory to make it easier to cleanup at a later time.
&gt;&gt;
&gt;&gt; Only thing I can suggest is talking to the sys admin some more about TCP connections between VMs on OpenStack and getting their help. Something is obviously blocking communications, but it is likely something only they can identify. Clouds tend to be finicky in that regard.
&gt;&gt;
&gt;&gt; You could also try the standard network diagnostics to see if TCP is capable of getting thru.
&gt;&gt;
&gt;&gt;
&gt;&gt;&gt; On Mar 28, 2015, at 4:00 PM, Douglas L Reeder &lt;dlr1_at_[hidden]&gt; wrote:
&gt;&gt;&gt;
&gt;&gt;&gt; Building as root is a bad idea. Try building it as a regular user, using sudo make install if necessary.
&gt;&gt;&gt;
&gt;&gt;&gt; Doug Reeder
&gt;&gt;&gt; On Mar 28, 2015, at 4:53 PM, LOTFIFAR F. &lt;foad.lotfifar_at_[hidden]&gt; wrote:
&gt;&gt;&gt;
&gt;&gt;&gt;&gt; when you said --debug-enable is not activated, I installed it again to make sure. I have only one mpi installed on all VMs.
&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt; FYI: I have just tried mpich to see how does it works. it freezes for few minutes then comes back with the error complaining about the firewall!!!! By the way,  I have already have firewall disabled and iptable is set to allow all connections. I checked with system admin and there is no other firewall between the nodes.
&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt; here is the output of what you are asked:
&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt; ubuntu_at_fehg-node-0:~$ which mpirun
&gt;&gt;&gt;&gt; /usr/local/openmpi/bin/mpirun
&gt;&gt;&gt;&gt; ubuntu_at_fehg-node-0:~$ ompi_info
&gt;&gt;&gt;&gt;                 Package: Open MPI ubuntu_at_fehg-node-0 Distribution
&gt;&gt;&gt;&gt;                Open MPI: 1.6.5
&gt;&gt;&gt;&gt;   Open MPI SVN revision: r28673
&gt;&gt;&gt;&gt;   Open MPI release date: Jun 26, 2013
&gt;&gt;&gt;&gt;                Open RTE: 1.6.5
&gt;&gt;&gt;&gt;   Open RTE SVN revision: r28673
&gt;&gt;&gt;&gt;   Open RTE release date: Jun 26, 2013
&gt;&gt;&gt;&gt;                    OPAL: 1.6.5
&gt;&gt;&gt;&gt;       OPAL SVN revision: r28673
&gt;&gt;&gt;&gt;       OPAL release date: Jun 26, 2013
&gt;&gt;&gt;&gt;                 MPI API: 2.1
&gt;&gt;&gt;&gt;            Ident string: 1.6.5
&gt;&gt;&gt;&gt;                  Prefix: /usr/local/openmpi
&gt;&gt;&gt;&gt; Configured architecture: i686-pc-linux-gnu
&gt;&gt;&gt;&gt;          Configure host: fehg-node-0
&gt;&gt;&gt;&gt;           Configured by: ubuntu
&gt;&gt;&gt;&gt;           Configured on: Sat Mar 28 20:19:28 UTC 2015
&gt;&gt;&gt;&gt;          Configure host: fehg-node-0
&gt;&gt;&gt;&gt;                Built by: root
&gt;&gt;&gt;&gt;                Built on: Sat Mar 28 20:30:18 UTC 2015
&gt;&gt;&gt;&gt;              Built host: fehg-node-0
&gt;&gt;&gt;&gt;              C bindings: yes
&gt;&gt;&gt;&gt;            C++ bindings: yes
&gt;&gt;&gt;&gt;      Fortran77 bindings: no
&gt;&gt;&gt;&gt;      Fortran90 bindings: no
&gt;&gt;&gt;&gt; Fortran90 bindings size: na
&gt;&gt;&gt;&gt;              C compiler: gcc
&gt;&gt;&gt;&gt;     C compiler absolute: /usr/bin/gcc
&gt;&gt;&gt;&gt;  C compiler family name: GNU
&gt;&gt;&gt;&gt;      C compiler version: 4.6.3
&gt;&gt;&gt;&gt;            C++ compiler: g++
&gt;&gt;&gt;&gt;   C++ compiler absolute: /usr/bin/g++
&gt;&gt;&gt;&gt;      Fortran77 compiler: none
&gt;&gt;&gt;&gt;  Fortran77 compiler abs: none
&gt;&gt;&gt;&gt;      Fortran90 compiler: none
&gt;&gt;&gt;&gt;  Fortran90 compiler abs: none
&gt;&gt;&gt;&gt;             C profiling: yes
&gt;&gt;&gt;&gt;           C++ profiling: yes
&gt;&gt;&gt;&gt;     Fortran77 profiling: no
&gt;&gt;&gt;&gt;     Fortran90 profiling: no
&gt;&gt;&gt;&gt;          C++ exceptions: no
&gt;&gt;&gt;&gt;          Thread support: posix (MPI_THREAD_MULTIPLE: no, progress: no)
&gt;&gt;&gt;&gt;           Sparse Groups: no
&gt;&gt;&gt;&gt;  Internal debug support: yes
&gt;&gt;&gt;&gt;  MPI interface warnings: no
&gt;&gt;&gt;&gt;     MPI parameter check: runtime
&gt;&gt;&gt;&gt; Memory profiling support: no
&gt;&gt;&gt;&gt; Memory debugging support: no
&gt;&gt;&gt;&gt;         libltdl support: yes
&gt;&gt;&gt;&gt;   Heterogeneous support: no
&gt;&gt;&gt;&gt; mpirun default --prefix: no
&gt;&gt;&gt;&gt;         MPI I/O support: yes
&gt;&gt;&gt;&gt;       MPI_WTIME support: gettimeofday
&gt;&gt;&gt;&gt;     Symbol vis. support: yes
&gt;&gt;&gt;&gt;   Host topology support: yes
&gt;&gt;&gt;&gt;          MPI extensions: affinity example
&gt;&gt;&gt;&gt;   FT Checkpoint support: no (checkpoint thread: no)
&gt;&gt;&gt;&gt;     VampirTrace support: yes
&gt;&gt;&gt;&gt;  MPI_MAX_PROCESSOR_NAME: 256
&gt;&gt;&gt;&gt;    MPI_MAX_ERROR_STRING: 256
&gt;&gt;&gt;&gt;     MPI_MAX_OBJECT_NAME: 64
&gt;&gt;&gt;&gt;        MPI_MAX_INFO_KEY: 36
&gt;&gt;&gt;&gt;        MPI_MAX_INFO_VAL: 256
&gt;&gt;&gt;&gt;       MPI_MAX_PORT_NAME: 1024
&gt;&gt;&gt;&gt;  MPI_MAX_DATAREP_STRING: 128
&gt;&gt;&gt;&gt;           MCA backtrace: execinfo (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;              MCA memory: linux (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;           MCA paffinity: hwloc (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;               MCA carto: auto_detect (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;               MCA carto: file (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;               MCA shmem: mmap (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;               MCA shmem: posix (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;               MCA shmem: sysv (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;           MCA maffinity: first_use (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;           MCA maffinity: hwloc (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;               MCA timer: linux (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;         MCA installdirs: env (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;         MCA installdirs: config (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;             MCA sysinfo: linux (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;               MCA hwloc: hwloc132 (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                 MCA dpm: orte (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;              MCA pubsub: orte (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;           MCA allocator: basic (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;           MCA allocator: bucket (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                MCA coll: basic (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                MCA coll: hierarch (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                MCA coll: inter (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                MCA coll: self (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                MCA coll: sm (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                MCA coll: sync (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                MCA coll: tuned (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                  MCA io: romio (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;               MCA mpool: fake (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;               MCA mpool: rdma (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;               MCA mpool: sm (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                 MCA pml: bfo (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                 MCA pml: csum (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                 MCA pml: ob1 (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                 MCA pml: v (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                 MCA bml: r2 (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;              MCA rcache: vma (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                 MCA btl: self (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                 MCA btl: sm (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                 MCA btl: tcp (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                MCA topo: unity (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                 MCA osc: pt2pt (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                 MCA osc: rdma (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                 MCA iof: hnp (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                 MCA iof: orted (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                 MCA iof: tool (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                 MCA oob: tcp (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                MCA odls: default (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                 MCA ras: cm (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                 MCA ras: loadleveler (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                 MCA ras: slurm (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;               MCA rmaps: load_balance (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;               MCA rmaps: rank_file (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;               MCA rmaps: resilient (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;               MCA rmaps: round_robin (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;               MCA rmaps: seq (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;               MCA rmaps: topo (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                 MCA rml: oob (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;              MCA routed: binomial (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;              MCA routed: cm (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;              MCA routed: direct (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;              MCA routed: linear (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;              MCA routed: radix (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;              MCA routed: slave (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                 MCA plm: rsh (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                 MCA plm: slurm (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;               MCA filem: rsh (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;              MCA errmgr: default (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                 MCA ess: env (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                 MCA ess: hnp (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                 MCA ess: singleton (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                 MCA ess: slave (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                 MCA ess: slurm (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                 MCA ess: slurmd (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;                 MCA ess: tool (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;             MCA grpcomm: bad (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;             MCA grpcomm: basic (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;             MCA grpcomm: hier (MCA v2.0, API v2.0, Component v1.6.5)
&gt;&gt;&gt;&gt;            MCA notifier: command (MCA v2.0, API v1.0, Component v1.6.5)
&gt;&gt;&gt;&gt;            MCA notifier: syslog (MCA v2.0, API v1.0, Component v1.6.5)
&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt; Regards,
&gt;&gt;&gt;&gt; Karos
&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt; From: users [users-bounces_at_[hidden]] on behalf of Ralph Castain [rhc_at_[hidden]]
&gt;&gt;&gt;&gt; Sent: 28 March 2015 22:04
&gt;&gt;&gt;&gt; To: Open MPI Users
&gt;&gt;&gt;&gt; Subject: Re: [OMPI users] Connection problem on Linux cluster
&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt; Something is clearly wrong. Most likely, you are not pointing at the OMPI install that you think you are - or you didn&#146;t really configure it properly. Check the path by running &#147;which mpirun&#148; and ensure you are executing the one you expected. If so, then run &#147;ompi_info&#148; to see how it was configured and sent it to us.
&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt; On Mar 28, 2015, at 1:36 PM, LOTFIFAR F. &lt;foad.lotfifar_at_[hidden]&gt; wrote:
&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt; surprisingly,  it is all that I get!! nothing else come after.  This is the same for openmpi-1.6.5.
&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt; From: users [users-bounces_at_[hidden]] on behalf of Ralph Castain [rhc_at_[hidden]]
&gt;&gt;&gt;&gt;&gt; Sent: 28 March 2015 20:12
&gt;&gt;&gt;&gt;&gt; To: Open MPI Users
&gt;&gt;&gt;&gt;&gt; Subject: Re: [OMPI users] Connection problem on Linux cluster
&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt; Did you configure &#151;enable-debug? We aren&#146;t seeing any of the debug output, so I suspect not.
&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;&gt; On Mar 28, 2015, at 12:56 PM, LOTFIFAR F. &lt;foad.lotfifar_at_[hidden]&gt; wrote:
&gt;&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;&gt; I have done it and it is the results:
&gt;&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;&gt; ubuntu_at_fehg-node-0:~$ mpirun -host fehg-node-7 -mca oob_base_verbose 100 -mca state_base_verbose 10 hostname
&gt;&gt;&gt;&gt;&gt;&gt; [fehg-node-0:30034] mca: base: components_open: Looking for oob components
&gt;&gt;&gt;&gt;&gt;&gt; [fehg-node-0:30034] mca: base: components_open: opening oob components
&gt;&gt;&gt;&gt;&gt;&gt; [fehg-node-0:30034] mca: base: components_open: found loaded component tcp
&gt;&gt;&gt;&gt;&gt;&gt; [fehg-node-0:30034] mca: base: components_open: component tcp register function successful
&gt;&gt;&gt;&gt;&gt;&gt; [fehg-node-0:30034] mca: base: components_open: component tcp open function successful
&gt;&gt;&gt;&gt;&gt;&gt; [fehg-node-7:31138] mca: base: components_open: Looking for oob components
&gt;&gt;&gt;&gt;&gt;&gt; [fehg-node-7:31138] mca: base: components_open: opening oob components
&gt;&gt;&gt;&gt;&gt;&gt; [fehg-node-7:31138] mca: base: components_open: found loaded component tcp
&gt;&gt;&gt;&gt;&gt;&gt; [fehg-node-7:31138] mca: base: components_open: component tcp register function successful
&gt;&gt;&gt;&gt;&gt;&gt; [fehg-node-7:31138] mca: base: components_open: component tcp open function successful
&gt;&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;&gt; freeze ...
&gt;&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;&gt; Regards
&gt;&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;&gt; From: users [users-bounces_at_[hidden]] on behalf of LOTFIFAR F. [foad.lotfifar_at_[hidden]]
&gt;&gt;&gt;&gt;&gt;&gt; Sent: 28 March 2015 18:49
&gt;&gt;&gt;&gt;&gt;&gt; To: Open MPI Users
&gt;&gt;&gt;&gt;&gt;&gt; Subject: Re: [OMPI users] Connection problem on Linux cluster
&gt;&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;&gt; fehg_node_1 and fehg-node-7 are the same. it is just a typo.
&gt;&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;&gt; Correction: VM names are fehg-node-0 and fehg-node-7.
&gt;&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;&gt; Regards,
&gt;&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;&gt; From: users [users-bounces_at_[hidden]] on behalf of Ralph Castain [rhc_at_[hidden]]
&gt;&gt;&gt;&gt;&gt;&gt; Sent: 28 March 2015 18:23
&gt;&gt;&gt;&gt;&gt;&gt; To: Open MPI Users
&gt;&gt;&gt;&gt;&gt;&gt; Subject: Re: [OMPI users] Connection problem on Linux cluster
&gt;&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;&gt; Just to be clear: do you have two physical nodes? Or just one physical node and you are running two VMs on it?
&gt;&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;&gt;&gt; On Mar 28, 2015, at 10:51 AM, LOTFIFAR F. &lt;foad.lotfifar_at_[hidden]&gt; wrote:
&gt;&gt;&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;&gt;&gt; I have a floating IP for accessing nodes from outside of the cluster and internal ip addresses. I tried to run the jobs with both of them (both ip addresses) but it makes no difference.
&gt;&gt;&gt;&gt;&gt;&gt;&gt; I have just installed openmpi 1.6.5 to see how does this version works. In this case I get nothing and I have to press Crtl+c. not output or error is shown.
&gt;&gt;&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;&gt;&gt; From: users [users-bounces_at_[hidden]] on behalf of Ralph Castain [rhc_at_[hidden]]
&gt;&gt;&gt;&gt;&gt;&gt;&gt; Sent: 28 March 2015 17:03
&gt;&gt;&gt;&gt;&gt;&gt;&gt; To: Open MPI Users
&gt;&gt;&gt;&gt;&gt;&gt;&gt; Subject: Re: [OMPI users] Connection problem on Linux cluster
&gt;&gt;&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;&gt;&gt; You mentioned running this in a VM - is that IP address correct for getting across the VMs?
&gt;&gt;&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; On Mar 28, 2015, at 8:38 AM, LOTFIFAR F. &lt;foad.lotfifar_at_[hidden]&gt; wrote:
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; Hi ,
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; I am wondering how can I solve this problem.
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; System Spec:
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; 1- Linux cluster with two nodes (master and slave) with Ubuntu 12.04 LTS 32bit.
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; 2- openmpi 1.8.4
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; I do a simple test running on fehg_node_0:
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; mpirun -host fehg_node_0,fehg_node_1 hello_world -mca oob_base_verbose 20
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; and I get the following error:
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; A process or daemon was unable to complete a TCP connection
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; to another process:
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;  Local host:    fehg-node-0
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;  Remote host:   10.104.5.40
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; This is usually caused by a firewall on the remote host. Please
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; check that any firewall (e.g., iptables) has been disabled and
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; try again.
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; ------------------------------------------------------------
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; --------------------------------------------------------------------------
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; ORTE was unable to reliably start one or more daemons.
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; This usually is caused by:
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; * not finding the required libraries and/or binaries on
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;  one or more nodes. Please check your PATH and LD_LIBRARY_PATH
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;  settings, or configure OMPI with --enable-orterun-prefix-by-default
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; * lack of authority to execute on one or more specified nodes.
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;  Please verify your allocation and authorities.
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; * the inability to write startup files into /tmp (--tmpdir/orte_tmpdir_base).
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;  Please check with your sys admin to determine the correct location to use.
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; *  compilation of the orted with dynamic libraries when static are required
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;  (e.g., on Cray). Please check your configure cmd line and consider using
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;  one of the contrib/platform definitions for your system type.
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; * an inability to create a connection back to mpirun due to a
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;  lack of common network interfaces and/or no route found between
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;  them. Please check network connectivity (including firewalls
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;  and network routing requirements).
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; Verbose:
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; 1- I have full access to the VMs on the cluster and setup everything myself
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; 2- Firewall and iptables are all disabled on the nodes
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; 3- nodes can ssh to each other with  no problem
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; 4- non-interactive bash calls works fine i.e. when I run ssh othernode env | grep PATH from both nodes, both PATH and LD_LIBRARY_PATH are set correctly
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; 5- I have checked the posts, a similar problem reported for Solaris but I could not find a clue about mine.
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; 6- run with --enable-orterun-prefix-by-default does not make any changes.
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; 7-  I see orte is running on the other node when I check processes, but nothing happens after that and the error happens.
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; Regards,
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; Karos
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; _______________________________________________
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; users mailing list
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; users_at_[hidden]
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/users/2015/03/26555.php">http://www.open-mpi.org/community/lists/users/2015/03/26555.php</a>
&gt;&gt;&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;&gt;&gt; _______________________________________________
&gt;&gt;&gt;&gt;&gt;&gt;&gt; users mailing list
&gt;&gt;&gt;&gt;&gt;&gt;&gt; users_at_[hidden]
&gt;&gt;&gt;&gt;&gt;&gt;&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
&gt;&gt;&gt;&gt;&gt;&gt;&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/users/2015/03/26557.php">http://www.open-mpi.org/community/lists/users/2015/03/26557.php</a>
&gt;&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt;&gt; _______________________________________________
&gt;&gt;&gt;&gt;&gt;&gt; users mailing list
&gt;&gt;&gt;&gt;&gt;&gt; users_at_[hidden]
&gt;&gt;&gt;&gt;&gt;&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
&gt;&gt;&gt;&gt;&gt;&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/users/2015/03/26562.php">http://www.open-mpi.org/community/lists/users/2015/03/26562.php</a>
&gt;&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt; _______________________________________________
&gt;&gt;&gt;&gt;&gt; users mailing list
&gt;&gt;&gt;&gt;&gt; users_at_[hidden]
&gt;&gt;&gt;&gt;&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
&gt;&gt;&gt;&gt;&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/users/2015/03/26564.php">http://www.open-mpi.org/community/lists/users/2015/03/26564.php</a>
&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt; _______________________________________________
&gt;&gt;&gt;&gt; users mailing list
&gt;&gt;&gt;&gt; users_at_[hidden]
&gt;&gt;&gt;&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
&gt;&gt;&gt;&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/users/2015/03/26566.php">http://www.open-mpi.org/community/lists/users/2015/03/26566.php</a>
&gt;&gt;&gt;
&gt;&gt;&gt; _______________________________________________
&gt;&gt;&gt; users mailing list
&gt;&gt;&gt; users_at_[hidden]
&gt;&gt;&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
&gt;&gt;&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/users/2015/03/26567.php">http://www.open-mpi.org/community/lists/users/2015/03/26567.php</a>
&gt;&gt;
&gt;&gt; _______________________________________________
&gt;&gt; users mailing list
&gt;&gt; users_at_[hidden]
&gt;&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
&gt;&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/users/2015/03/26569.php">http://www.open-mpi.org/community/lists/users/2015/03/26569.php</a>
&gt;
&gt;
&gt; --
&gt; Jeff Squyres
&gt; jsquyres_at_[hidden]
&gt; For corporate legal information go to: <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
&gt;
&gt; _______________________________________________
&gt; users mailing list
&gt; users_at_[hidden]
&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/users/2015/03/26570.php">http://www.open-mpi.org/community/lists/users/2015/03/26570.php</a>
&gt; _______________________________________________
&gt; users mailing list
&gt; users_at_[hidden]
&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/users/2015/03/26571.php">http://www.open-mpi.org/community/lists/users/2015/03/26571.php</a>

_______________________________________________
users mailing list
users_at_[hidden]
Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
Link to this post: <a href="http://www.open-mpi.org/community/lists/users/2015/03/26572.php">http://www.open-mpi.org/community/lists/users/2015/03/26572.php</a>
<br>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="26577.php">Jeff Squyres (jsquyres): "Re: [OMPI users] Connection problem on Linux cluster"</a>
<li><strong>Previous message:</strong> <a href="26575.php">Mike Dubman: "Re: [OMPI users] MPI_THREAD_MULTIPLE and openib btl"</a>
<li><strong>In reply to:</strong> <a href="26572.php">Ralph Castain: "Re: [OMPI users] Connection problem on Linux cluster"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="26577.php">Jeff Squyres (jsquyres): "Re: [OMPI users] Connection problem on Linux cluster"</a>
<li><strong>Reply:</strong> <a href="26577.php">Jeff Squyres (jsquyres): "Re: [OMPI users] Connection problem on Linux cluster"</a>
<!-- reply="end" -->
</ul>
<div class="center">
<table border="2" width="100%" class="links">
<tr>
<th><a href="date.php">Date view</a></th>
<th><a href="index.php">Thread view</a></th>
<th><a href="subject.php">Subject view</a></th>
<th><a href="author.php">Author view</a></th>
</tr>
</table>
</div>
<!-- trailer="footer" -->
<? include("../../include/msg-footer.inc") ?>
