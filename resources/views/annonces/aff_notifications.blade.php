@extends('base')
@section('content')
<div class="col-md-12">
	<div class="order-summary clearfix">
		<div class="section-title">
			<h3 class="title">Mes Notifications</h3>
		</div>
		<table class="shopping-cart-table table">
								<thead>
									<tr>
										<th>Notification</th>
										
										<th class="text-center">Type d'objet</th>
										<th class="text-center">Titre</th>
										<th class="text-right"></th>
									</tr>
								</thead>
								<tbody>
                                @foreach(auth()->user()->notifications as $notification)
									<tr>
										<td class="thumb"><img src="annonce_affichage/fetch_image/{{ $notification->data['id'] }}" alt="" ></td>
                                        <td class="price text-center"><strong>{{$notification->data['typeObjet']}}</strong><br><!--<del class="font-weak"><small>sous type</small></del>--></td>
                                        <td class="total text-center"><strong class="primary-color">{{$notification->data['title']}}</strong></td>
										
										
										<td class="text-right">
                                            <a href="/annonce/{{$notification->data['id']}}">
                                                <button type="button" class="btn btn-primary">plus de détails</button>
                                            </a>
											<a href="{{$notification->destroy()}}">
												<button type="button" class="btn btn-danger">Supprimer</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
								</tbody>
		</table>
							
	</div>

</div>
@endsection