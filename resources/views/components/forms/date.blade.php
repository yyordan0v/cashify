<div x-data="{
      datePickerOpen: false,
      startDate: '',
      endDate: '',
      datePickerFormat: 'M d, Y',
      datePickerMonth: '',
      datePickerYear: '',
      datePickerDay: '',
      datePickerDaysInMonth: [],
      datePickerBlankDaysInMonth: [],
      datePickerMonthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      datePickerDays: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      datePickerDayClicked(day) {
        let selectedDate = new Date(this.datePickerYear, this.datePickerMonth, day);
        let formattedDate = this.datePickerFormatDate(selectedDate);

        if (!this.startDate || (this.startDate && this.endDate)) {
          this.startDate = formattedDate;
          this.endDate = '';
        } else if (this.startDate && !this.endDate) {
          if (new Date(this.startDate) > selectedDate) {
            this.endDate = this.startDate;
            this.startDate = formattedDate;
          } else {
            this.endDate = formattedDate;
          }
        }

        if (this.startDate && this.endDate) {
          this.datePickerOpen = false;
        }
      },
      datePickerPreviousMonth(){
        if (this.datePickerMonth == 0) {
            this.datePickerYear--;
            this.datePickerMonth = 11;
        } else {
            this.datePickerMonth--;
        }
        this.datePickerCalculateDays();
      },
      datePickerNextMonth(){
        if (this.datePickerMonth == 11) {
            this.datePickerMonth = 0;
            this.datePickerYear++;
        } else {
            this.datePickerMonth++;
        }
        this.datePickerCalculateDays();
      },
      datePickerIsSelectedDate(day) {
        const d = new Date(this.datePickerYear, this.datePickerMonth, day);
        const formattedDate = this.datePickerFormatDate(d);
        return formattedDate === this.startDate || formattedDate === this.endDate;
      },
      datePickerIsInRange(day) {
        const d = new Date(this.datePickerYear, this.datePickerMonth, day);
        if (!this.startDate || !this.endDate) return false;
        const start = new Date(this.startDate);
        const end = new Date(this.endDate);
        return d > start && d < end;
      },
      datePickerIsToday(day) {
        const today = new Date();
        const d = new Date(this.datePickerYear, this.datePickerMonth, day);
        return today.toDateString() === d.toDateString();
      },
      datePickerCalculateDays() {
        let daysInMonth = new Date(this.datePickerYear, this.datePickerMonth + 1, 0).getDate();
        let firstDayOfMonth = new Date(this.datePickerYear, this.datePickerMonth, 1).getDay();
        // Adjusting for the week to start from Monday
        firstDayOfMonth = (firstDayOfMonth === 0) ? 6 : firstDayOfMonth - 1;
        let blankdaysArray = [];
        for (var i = 0; i < firstDayOfMonth; i++) {
            blankdaysArray.push(i);
        }
        let daysArray = [];
        for (var i = 1; i <= daysInMonth; i++) {
            daysArray.push(i);
        }
        this.datePickerBlankDaysInMonth = blankdaysArray;
        this.datePickerDaysInMonth = daysArray;
      },
      datePickerFormatDate(date) {
        let formattedDay = this.datePickerDays[date.getDay() - 1];
        if (date.getDay() === 0) {
            formattedDay = this.datePickerDays[6];
        }
        let formattedDate = ('0' + date.getDate()).slice(-2);
        let formattedMonth = this.datePickerMonthNames[date.getMonth()];
        let formattedMonthShortName = this.datePickerMonthNames[date.getMonth()].substring(0, 3);
        let formattedMonthInNumber = ('0' + (parseInt(date.getMonth()) + 1)).slice(-2);
        let formattedYear = date.getFullYear();

        if (this.datePickerFormat === 'M d, Y') {
          return `${formattedMonthShortName} ${formattedDate}, ${formattedYear}`;
        }
        if (this.datePickerFormat === 'MM-DD-YYYY') {
          return `${formattedMonthInNumber}-${formattedDate}-${formattedYear}`;
        }
        if (this.datePickerFormat === 'DD-MM-YYYY') {
          return `${formattedDate}-${formattedMonthInNumber}-${formattedYear}`;
        }
        if (this.datePickerFormat === 'YYYY-MM-DD') {
          return `${formattedYear}-${formattedMonthInNumber}-${formattedDate}`;
        }
        if (this.datePickerFormat === 'D d M, Y') {
          return `${formattedDay} ${formattedDate} ${formattedMonthShortName} ${formattedYear}`;
        }

        return `${formattedMonth} ${formattedDate}, ${formattedYear}`;
      },
      setToday() {
        let today = new Date();
        this.startDate = this.datePickerFormatDate(today);
        this.endDate = this.datePickerFormatDate(today);
        this.datePickerOpen = false;
      },
      setYesterday() {
        let yesterday = new Date();
        yesterday.setDate(yesterday.getDate() - 1);
        this.startDate = this.datePickerFormatDate(yesterday);
        this.endDate = this.datePickerFormatDate(yesterday);
        this.datePickerOpen = false;
      }
    }" x-init="
        currentDate = new Date();
        datePickerMonth = currentDate.getMonth();
        datePickerYear = currentDate.getFullYear();
        datePickerCalculateDays();
    " x-cloak>
    <div class="w-full mb-5">
        {{--        <label for="datepicker" class="block mb-1 text-sm font-medium text-neutral-500">Select Date Range</label>--}}
        <div class="relative w-[17rem]">
            <input x-ref="datePickerInput" type="text" @click="datePickerOpen=!datePickerOpen"
                   :value="startDate && endDate ? `${startDate} - ${endDate}` : ''"
                   x-on:keydown.escape="datePickerOpen=false"
                   class="flex w-full h-10 px-3 py-2 text-sm bg-white border text-neutral-600 placeholder:text-neutral-400 disabled:cursor-not-allowed disabled:opacity-50 rounded-lg shadow-sm mt-2 border-gray-300 dark:border-gray-500 dark:bg-neutral-900/50 dark:text-white focus:border-gray-500 focus:ring-gray-500"
                   placeholder="Select date range" readonly/>
            <div @click="datePickerOpen=!datePickerOpen; if(datePickerOpen){ $refs.datePickerInput.focus() }"
                 class="absolute top-0 right-0 px-3 py-2 cursor-pointer text-gray-400 hover:text-gray-500 dark:text-gray-500 dark:hover:text-gray-400 transition-colors duration-75 ease-in">
                <x-icon>
                    calendar_today
                </x-icon>
            </div>
            <div
                x-show="datePickerOpen"
                x-transition
                @click.away="datePickerOpen = false"
                class="absolute z-20 top-0 left-0 max-w-lg p-4 mt-12 antialiased shadow w-[17rem] rounded-xl border bg-white/95 border-neutral-300/50 dark:border-neutral-800/50 dark:bg-neutral-900/95 dark:shadow backdrop-blur-lg">
                <div class="flex items-center justify-between mb-2">
                    <div>
                            <span x-text="datePickerMonthNames[datePickerMonth]"
                                  class="text-lg font-bold text-gray-800 dark:text-gray-100"></span>
                        <span x-text="datePickerYear"
                              class="ml-1 text-lg font-normal text-gray-600 dark:text-gray-400"></span>
                    </div>
                    <div>
                        <button @click="datePickerPreviousMonth()" type="button"
                                class="inline-flex p-1 transition duration-100 ease-in-out rounded-full cursor-pointer focus:outline-none focus:shadow-outline hover:bg-gray-100 dark:hover:bg-gray-700">
                            <x-icon class="text-gray-400">
                                chevron_left
                            </x-icon>
                        </button>
                        <button @click="datePickerNextMonth()" type="button"
                                class="inline-flex p-1 transition duration-100 ease-in-out rounded-full cursor-pointer focus:outline-none focus:shadow-outline hover:bg-gray-100 dark:hover:bg-gray-700">
                            <x-icon class="text-gray-400">
                                chevron_right
                            </x-icon>
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-7 mb-3">
                    <template x-for="(day, index) in datePickerDays" :key="index">
                        <div class="px-0.5">
                            <div x-text="day"
                                 class="text-xs font-medium text-center text-gray-800 dark:text-gray-200"></div>
                        </div>
                    </template>
                </div>
                <div class="grid grid-cols-7">
                    <template x-for="blankDay in datePickerBlankDaysInMonth">
                        <div class="p-1 text-sm text-center border border-transparent"></div>
                    </template>
                    <template x-for="(day, dayIndex) in datePickerDaysInMonth" :key="dayIndex">
                        <div class="px-0.5 mb-1 aspect-square">
                            <div
                                x-text="day"
                                @click="datePickerDayClicked(day)"
                                :class="{
                                        'bg-neutral-200 dark:bg-neutral-400': datePickerIsToday(day),
                                        'bg-neutral-800 dark:bg-neutral-100 text-white dark:text-black hover:bg-opacity-75': datePickerIsSelectedDate(day),
                                        'bg-neutral-300 dark:bg-neutral-400 dark:text-black': datePickerIsInRange(day),
                                        'text-gray-600 dark:text-gray-300 hover:bg-neutral-200 dark:hover:bg-neutral-700': !datePickerIsToday(day) && !datePickerIsSelectedDate(day) && !datePickerIsInRange(day)
                                    }"
                                class="flex items-center justify-center text-sm leading-none text-center rounded-lg cursor-pointer h-7 w-7"></div>
                        </div>
                    </template>
                </div>
                <div class="flex mb-2 justify-between space-x-2 w-full">
                    <x-buttons.secondary @click="setYesterday">Yesterday</x-buttons.secondary>
                    <x-buttons.form @click="setToday">Today</x-buttons.form>
                </div>
            </div>
        </div>
    </div>
</div>
