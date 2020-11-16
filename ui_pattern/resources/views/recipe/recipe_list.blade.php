<x-app-layout>
   <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           レシピ一覧
       </h2>
   </x-slot>
	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
				@if (session('status'))
				<div class="success mt-5 px-4 text-green-900">
					{{ session('status') }}
				</div>
				@endif
				<!-- ページ固有要素 -->
				<div class="mt-5 px-4 py-5">

                    @include("recipe.recipe_search_form")

					<table class="w-full border shadow my-6">
						<thead>
							<tr class="py-3">
								<th class="px-3 py-3 text-center border">ID</th>
								<th class="px-3 py-3 text-center border">レシピ名</th>
								<th class="px-3 py-3 text-center border">作成日</th>
								<th class="px-3 py-3 text-center border">更新日</th>
								<th class="px-3 py-3 text-center border">詳細</th>
							</tr>
						</thead>
						<tbody>
						@foreach($recipe_list as $recipe)
						<tr>
							<td class="px-3 py-3 border">{{ $recipe->id }}</td>
							<td class="px-3 py-3 border">{{ $recipe->name }}</td>
							<td class="px-3 py-3 border">{{ $recipe->created_at->format("Y-m-d H:i:s") }}</td>
							<td class="px-3 py-3 border">{{ $recipe->updated_at->format("Y-m-d H:i:s") }}</td>
							<td class="px-3 py-3 border">
								<a href="{{ route('recipe_detail', ['id' => $recipe->id]) }}" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">詳細</a>
							</td>
						</tr>
						@endforeach
						</tbody>
					</table>
					{{ $recipe_list->links() }}
				</div>
				<!-- /ページ固有要素 ここまで -->
			</div>
		</div>
	</div>
</x-app-layout>
