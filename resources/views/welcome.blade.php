<x-layout>
    <header class="w-full py-2 shadow shadow-slate-300">
        <nav class="container mx-auto">
            <section>
                <h1 class="text-2xl font-medium text-slate-300">
                    Learn API Docs
                </h1>
            </section>
        </nav>
    </header>

    <main class="w-full">
        <header class="flex items-center justify-center w-full h-96">
            <h1 class="text-5xl font-semibold text-slate-300">
                API DOCS
            </h1>
        </header>

        <article class="flex justify-center w-full">
            <section class="min-w-2xl">
                <hr class="w-full text-white" />

                <x-dropdown :categories="$list_api" :key="$category" />
@if($category && count($data_method_api) > 0)
  <section class="w-full mt-5">
      <header class="w-full">
          <h1 class="text-lg font-semibold text-slate-300">
              Response
          </h1>
      </header>

      <div
          id="accordion-collapse"
          data-accordion="collapse"
          class="space-y-3 overflow-hidden shadow-xs"
      >
      @foreach ($data_method_api as $method  )
        
      <section>
          <h2 id="accordion-collapse-heading-{{ $loop->iteration }}">
              <button
                  type="button"
                  class="flex items-center justify-between w-full gap-3 px-2 py-3 font-medium cursor-pointer bg-slate-300 rtl:text-right text-body rounded border border-t-0 border-x-0 border-b-default hover:text-heading"
                  data-accordion-target="#accordion-collapse-body-{{ $loop->iteration }}"
                  aria-expanded="true"
                  aria-controls="accordion-collapse-body-{{ $loop->iteration }}"
              >
                  <section class="flex items-center gap-2">
                     <span class="p-1 text-white bg-{{ $method['color'] }}-400 rounded">
                        {{ $method['method'] }}
                      </span>
                      <p>{{ $method['endpoint'] }}</p>
                  </section>

                  <svg
                      data-accordion-icon
                      class="w-5 h-5 rotate-180 shrink-0"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                  >
                      <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="m5 15 7-7 7 7"
                      />
                  </svg>
              </button>
          </h2>

          <div
              id="accordion-collapse-body-{{ $loop->iteration }}"
              class="hidden px-2 border rounded border-default"
              aria-labelledby="accordion-collapse-heading-{{ $loop->iteration }}"
          >
              <pre class="text-white">
<code>{{  $method['method'] === "GET" ? json_encode($method['responses']['success'], JSON_PRETTY_PRINT) : json_encode($method['parameters'], JSON_PRETTY_PRINT) }}</code>
              </pre>
          </div>
      </section>
      @endforeach
        
      </div>
  </section>
@endif
            </section>
        </article>
    </main>
</x-layout>