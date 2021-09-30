<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-sm text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

  <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8" x-data="{selected:1}">
    Hello this is the boggie man
    
    <ul class="shadow-lg">
      <li class="relative border-b border-gray-200">
        <button class="w-full px-4 py-3" @click="selected !== 1 ? selected = 1 : selected = null">
          <div class="flex items-center justify-between">
            <span>Should I use reCAPTCHA v2 or v3?</span>
            <span class="fas fa-caret-down"></span>
          </div>
        </button>

        <div class="border-t relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="container1" x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
          <div class="p-6">
            <table class="w-full">
              <tr>
                <td class="border px-2 py-2">Alfreds Futterkiste</td>
                <td class="border px-2 py-2">Dante Sparks</td>
              </tr>
              <tr>
                <td class="border px-2 py-2">Centro comercial Moctezuma</td>
                <td class="border px-2 py-2">Neal Garrison</td>
              </tr>
            </table>
          </div>
        </div>
      </li>


      <li class="relative border-b border-gray-200">
        <button class="w-full px-4 py-3" @click="selected !== 2 ? selected = 2 : selected = null">
          <div class="flex items-center justify-between">
            <span>I'd like to run automated tests with reCAPTCHA. What should I do?</span>
            <span class="fas fa-caret-down"></span>
          </div>
        </button>

        <div class="border-t relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="container2" x-bind:style="selected == 2 ? 'max-height: ' + $refs.container2.scrollHeight + 'px' : ''">
          <div class="p-6">
            <table class="w-full">
              <tr>
                <td class="border px-2 py-2">Alfreds Futterkiste</td>
                <td class="border px-2 py-2">Dante Sparks</td>
              </tr>
              <tr>
                <td class="border px-2 py-2">Centro comercial Moctezuma</td>
                <td class="border px-2 py-2">Neal Garrison</td>
              </tr>
            </table>
          </div>
        </div>
      </li>

      <li class="relative border-b border-gray-200">
        <button class="w-full px-4 py-3" @click="selected !== 3 ? selected = 3 : selected = null">
          <div class="flex items-center justify-between">
            <span>Can I run reCAPTCHA v2 and v3 on the same page?</span>
            <span class="fas fa-caret-down"></span>
          </div>
        </button>

        <div class="border-t relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="container3" x-bind:style="selected == 3 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
          <div class="p-6">
            <table class="w-full">
              <tr>
                <td class="border px-2 py-2">Alfreds Futterkiste</td>
                <td class="border px-2 py-2">Dante Sparks</td>
              </tr>
              <tr>
                <td class="border px-2 py-2">Centro comercial Moctezuma</td>
                <td class="border px-2 py-2">Neal Garrison</td>
              </tr>
            </table>
          </div>
        </div>
      </li>
    </ul>


  </div>
</x-app-layout>