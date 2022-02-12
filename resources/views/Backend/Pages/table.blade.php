@extends('Backend.layout.master')
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->

@section('content')


    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Responsive Table Examples</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> Responsive Table</h4>
              <section id="unseen">
                <table class="table table-bordered table-striped table-condensed">
                @foreach ($users as $user)  
                <thead>
                    
                    <tr>  
                      <th>Company</th>

                        <td> {{$user->name}}</td>
                       
                        @endforeach
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Cmp</td>
                      
                    </tr>

                    <tr>
                      <td>Cmp</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                    </tr>

                    <tr>
                      <td>Cmp</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                    </tr>

                    <tr>
                      <td>Cmp</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                    </tr>

                    <tr>
                      <td>Cmp</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                    </tr>

                    <tr>
                      <td>Cmp</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                    </tr>

                    <tr>
                      <td>Cmp</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                    </tr>

                    <tr>
                      <td>Cmp</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                    </tr>

                    <tr>
                      <td>Cmp</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                    </tr>


                    <tr>
                      <td>Cmp</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                    </tr>

                    <tr>
                      <td>Cmp</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                      <td class="numeric">num</td>
                    </tr>

                  </tbody>
                </table>
              </section>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-lg-4 -->
        </div>
        <!-- /row -->

        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->

    @endsection
