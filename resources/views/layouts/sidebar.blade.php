<div class="sidebar hidden sm:block w-0 sm:w-1/6 bg-gray-200 h-screen shadow fixed top-0 left-0 bottom-0 z-40 overflow-y-auto">
    <div class="mb-6 mt-20 px-6">
        <a href="{{ route('home') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current feather feather-grid" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
            <span class="ml-2 text-sm font-semibold">Dashboard</span>
        </a>
        @role('Admin')
        <a href="{{ route('classes.index') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="grip-horizontal" class="svg-inline--fa fa-grip-horizontal fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M96 288H32c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zM96 96H32c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32z"></path></svg>
            <span class="ml-2 text-sm font-semibold">Classes</span>
        </a>
        <a href="{{ route('class_room.index') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="grip-horizontal" class="svg-inline--fa fa-grip-horizontal fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M96 288H32c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zM96 96H32c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32z"></path></svg>
            <span class="ml-2 text-sm font-semibold">Classe rooms</span>
        </a>
        <a href="{{ route('group.index') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="grip-horizontal" class="svg-inline--fa fa-grip-horizontal fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M96 288H32c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zM96 96H32c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32z"></path></svg>
            <span class="ml-2 text-sm font-semibold">Groups</span>
        </a>
        <a href="{{ route('subject.index') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="align-right" class="svg-inline--fa fa-align-right fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M160 84V44c0-8.837 7.163-16 16-16h256c8.837 0 16 7.163 16 16v40c0 8.837-7.163 16-16 16H176c-8.837 0-16-7.163-16-16zM16 228h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 256h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm160-128h256c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H176c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path></svg>
            <span class="ml-2 text-sm font-semibold">Subjects</span>
        </a>
        <a href="{{ route('exam.index') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="align-right" class="svg-inline--fa fa-align-right fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M160 84V44c0-8.837 7.163-16 16-16h256c8.837 0 16 7.163 16 16v40c0 8.837-7.163 16-16 16H176c-8.837 0-16-7.163-16-16zM16 228h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 256h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm160-128h256c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H176c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path></svg>
            <span class="ml-2 text-sm font-semibold">Exams</span>
        </a>
        <a href="{{ route('mark.index') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="align-right" class="svg-inline--fa fa-align-right fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M160 84V44c0-8.837 7.163-16 16-16h256c8.837 0 16 7.163 16 16v40c0 8.837-7.163 16-16 16H176c-8.837 0-16-7.163-16-16zM16 228h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 256h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm160-128h256c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H176c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path></svg>
            <span class="ml-2 text-sm font-semibold">Marks</span>
        </a>
        <a href="{{ route('teacher.index') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-edit" class="svg-inline--fa fa-user-edit fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h274.9c-2.4-6.8-3.4-14-2.6-21.3l6.8-60.9 1.2-11.1 7.9-7.9 77.3-77.3c-24.5-27.7-60-45.5-99.9-45.5zm45.3 145.3l-6.8 61c-1.1 10.2 7.5 18.8 17.6 17.6l60.9-6.8 137.9-137.9-71.7-71.7-137.9 137.8zM633 268.9L595.1 231c-9.3-9.3-24.5-9.3-33.8 0l-37.8 37.8-4.1 4.1 71.8 71.7 41.8-41.8c9.3-9.4 9.3-24.5 0-33.9z"></path></svg>
            <span class="ml-2 text-sm font-semibold">Teachers</span>
        </a>
        <a href="{{ route('parents.index') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-friends" class="svg-inline--fa fa-user-friends fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M192 256c61.9 0 112-50.1 112-112S253.9 32 192 32 80 82.1 80 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C51.6 288 0 339.6 0 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zM480 256c53 0 96-43 96-96s-43-96-96-96-96 43-96 96 43 96 96 96zm48 32h-3.8c-13.9 4.8-28.6 8-44.2 8s-30.3-3.2-44.2-8H432c-20.4 0-39.2 5.9-55.7 15.4 24.4 26.3 39.7 61.2 39.7 99.8v38.4c0 2.2-.5 4.3-.6 6.4H592c26.5 0 48-21.5 48-48 0-61.9-50.1-112-112-112z"></path></svg>
            <span class="ml-2 text-sm font-semibold">Parents</span>
        </a>
        <a href="{{ route('student.index') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-graduate" class="svg-inline--fa fa-user-graduate fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M319.4 320.6L224 416l-95.4-95.4C57.1 323.7 0 382.2 0 454.4v9.6c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-9.6c0-72.2-57.1-130.7-128.6-133.8zM13.6 79.8l6.4 1.5v58.4c-7 4.2-12 11.5-12 20.3 0 8.4 4.6 15.4 11.1 19.7L3.5 242c-1.7 6.9 2.1 14 7.6 14h41.8c5.5 0 9.3-7.1 7.6-14l-15.6-62.3C51.4 175.4 56 168.4 56 160c0-8.8-5-16.1-12-20.3V87.1l66 15.9c-8.6 17.2-14 36.4-14 57 0 70.7 57.3 128 128 128s128-57.3 128-128c0-20.6-5.3-39.8-14-57l96.3-23.2c18.2-4.4 18.2-27.1 0-31.5l-190.4-46c-13-3.1-26.7-3.1-39.7 0L13.6 48.2c-18.1 4.4-18.1 27.2 0 31.6z"></path></svg>
            <span class="ml-2 text-sm font-semibold">Students</span>
        </a>
        <a href="{{ route('planning.index') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-cog" class="svg-inline--fa fa-user-cog fa-w-20" role="img" id="Capa_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g><path d="m512 169c0-33.41 0-56.783 0-59 0-24.813-20.187-45-45-45h-6v55c0 8.284-6.716 15-15 15s-15-6.716-15-15c0-16.839 0-63.232 0-80 0-8.284-6.716-15-15-15s-15 6.716-15 15v25h-100v55c0 8.284-6.716 15-15 15s-15-6.716-15-15c0-16.839 0-63.232 0-80 0-8.284-6.716-15-15-15s-15 6.716-15 15v25h-100v55c0 8.284-6.716 15-15 15s-15-6.716-15-15c0-16.839 0-63.232 0-80 0-8.284-6.716-15-15-15s-15 6.716-15 15v25h-36c-24.813 0-45 20.187-45 45v59z"/><path d="m0 199v243c0 24.813 20.187 45 45 45h422c24.813 0 45-20.187 45-45 0-6.425 0-146.812 0-243-9.335 0-506.836 0-512 0zm144 208h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm128 128h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm128 128h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15z"/></g></svg>
            <span class="ml-2 text-sm font-semibold">Planning</span>
        </a>
        <a href="{{ route('attendance.index') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="id-badge" class="svg-inline--fa fa-id-badge fa-w-12" role="img" height="448pt" viewBox="-56 0 448 448" width="448pt" xmlns="http://www.w3.org/2000/svg"><path d="m138.902344 51.273438c-1.003906-1.09375-1.949219-2.238282-2.832032-3.433594-.566406-.800782-1.140624-1.480469-1.65625-2.273438-.859374-1.371094-1.632812-2.800781-2.316406-4.269531-.363281-.738281-.800781-1.433594-1.089844-2.191406-.882812-2.15625-1.578124-4.386719-2.070312-6.664063 0-.144531-.097656-.273437-.128906-.417968v-.023438h-48.808594v40c0 4.417969 3.582031 8 8 8h160c4.417969 0 8-3.582031 8-8v-40h-48.800781c0 .144531-.09375.273438-.128907.414062-.492187 2.28125-1.1875 4.507813-2.070312 6.664063-.3125.800781-.726562 1.457031-1.089844 2.195313-.683594 1.46875-1.457031 2.894531-2.316406 4.269531-.515625.800781-1.089844 1.511719-1.65625 2.273437-.882812 1.195313-1.828125 2.339844-2.832031 3.429688-.671875.714844-1.371094 1.378906-2.089844 2.042968-1.070313.988282-2.199219 1.917969-3.375 2.78125-.800781.585938-1.601563 1.144532-2.402344 1.671876-1.273437.789062-2.59375 1.503906-3.949219 2.144531-.847656.417969-1.679687.847656-2.5625 1.203125-1.550781.585937-3.136718 1.082031-4.75 1.476562-.800781.203125-1.550781.480469-2.402343.640625-5.011719 1.023438-10.183594 1.023438-15.199219 0-.800781-.160156-1.597656-.4375-2.398438-.640625-1.613281-.394531-3.199218-.890625-4.753906-1.476562-.878906-.355469-1.710937-.800782-2.558594-1.203125-1.355468-.640625-2.675781-1.355469-3.953124-2.144531-.800782-.527344-1.597657-1.085938-2.398438-1.671876-1.175781-.863281-2.304688-1.792968-3.375-2.78125-.664062-.640624-1.363281-1.289062-2.035156-2.015624zm0 0"/><path d="m0 448h336v-416h-64v16h40c4.417969 0 8 3.582031 8 8v304c0 .175781-.089844.328125-.105469.503906-.039062.699219-.175781 1.394532-.40625 2.054688-.089843.257812-.152343.503906-.265625.753906-.386718.871094-.925781 1.664062-1.597656 2.34375l-64 64c-1.496094 1.488281-3.515625 2.332031-5.625 2.34375h-224c-4.417969 0-8-3.582031-8-8v-368c0-4.417969 3.582031-8 8-8h40v-16h-64zm0 0"/><path d="m259.089844 193.601562-11.328125-11.328124-106.105469 106.101562c-3.125 3.117188-8.179688 3.117188-11.304688 0l-31.640624-31.574219-11.3125 11.261719 48.601562 48.625zm0 0"/><path d="m192 24c0 13.253906-10.746094 24-24 24s-24-10.746094-24-24 10.746094-24 24-24 24 10.746094 24 24zm0 0"/><path d="m292.6875 368h-36.6875v36.6875zm0 0"/><path d="m64 72v-8h-32v352h208v-56c0-4.417969 3.582031-8 8-8h56v-288h-32v8c0 13.253906-10.746094 24-24 24h-160c-13.253906 0-24-10.746094-24-24zm29.070312 167.855469c3.125-3.113281 8.175782-3.113281 11.296876 0l31.632812 31.558593 106.105469-106.109374c3.121093-3.125 8.1875-3.125 11.308593 0l22.640626 22.640624c3.125 3.121094 3.125 8.1875 0 11.3125l-134.398438 134.398438c-3.125 3.121094-8.1875 3.121094-11.3125 0l-59.917969-59.921875c-1.503906-1.5-2.347656-3.535156-2.347656-5.660156 0-2.121094.84375-4.15625 2.347656-5.660157zm0 0"/></svg>
            <span class="ml-2 text-sm font-semibold">Attendance</span>
        </a>
        <a href="" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="id-badge" class="svg-inline--fa fa-id-badge fa-w-12" role="img"  height="456pt" viewBox="-3 0 456 456.392" width="456pt" xmlns="http://www.w3.org/2000/svg"><path d="m14.277344 128.390625 24.320312 14.304687c5.894532-5 13.125-8.171874 20.796875-9.128906l171.898438-21.117187c4.386719-.539063 8.378906 2.578125 8.917969 6.964843.539062 4.390626-2.578126 8.382813-6.96875 8.921876l-171.894532 21.121093c-2.585937.335938-5.101562 1.09375-7.441406 2.246094l178.289062 105.082031 217.921876-128.394531-217.921876-128.390625zm0 0"/><path d="m228.132812 272.96875-155.9375-91.863281v83.285156c0 22.023437 19.039063 43.433594 52.234376 58.738281 34.023437 14.589844 70.746093 21.835938 107.765624 21.261719 37.015626.578125 73.738282-6.667969 107.761719-21.261719 33.199219-15.304687 52.238281-36.714844 52.238281-58.738281v-83.285156l-155.933593 91.863281c-2.507813 1.476562-5.621094 1.476562-8.128907 0zm0 0"/><path d="m48.195312 440.390625-16-88-32 104zm0 0"/><path d="m56.195312 328.390625c-.015624-10.140625-6.429687-19.167969-16-22.527344v-132.589843c.023438-3.367188.757813-6.691407 2.160157-9.753907 2.304687-5.160156 6.355469-9.339843 11.441406-11.808593l-15.25-9.007813c-4.144531 3.515625-7.535156 7.839844-9.957031 12.703125-2.847656 5.527344-4.351563 11.648438-4.394532 17.867188v132.589843c-11.476562 4.089844-18.058593 16.136719-15.296874 28.003907 2.765624 11.867187 13.992187 19.769531 26.09375 18.367187 12.101562-1.398437 21.226562-11.660156 21.203124-23.84375zm0 0"/></svg>
            <span class="ml-2 text-sm font-semibold">Promotion</span>
        </a>
        <a href="" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="id-badge" class="svg-inline--fa fa-id-badge fa-w-12" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M336 0H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48zM144 32h96c8.8 0 16 7.2 16 16s-7.2 16-16 16h-96c-8.8 0-16-7.2-16-16s7.2-16 16-16zm48 128c35.3 0 64 28.7 64 64s-28.7 64-64 64-64-28.7-64-64 28.7-64 64-64zm112 236.8c0 10.6-10 19.2-22.4 19.2H102.4C90 416 80 407.4 80 396.8v-19.2c0-31.8 30.1-57.6 67.2-57.6h5c12.3 5.1 25.7 8 39.8 8s27.6-2.9 39.8-8h5c37.1 0 67.2 25.8 67.2 57.6v19.2z"></path></svg>
            <span class="ml-2 text-sm font-semibold">Student fees</span>
        </a>
        <a href="" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="id-badge" class="svg-inline--fa fa-id-badge fa-w-12" role="img" height="446pt" viewBox="-39 0 446 446.936" width="446pt" xmlns="http://www.w3.org/2000/svg"><path d="m268.117188 158.9375h-183.296876l-65.105468 100.613281c-12.574219 19.414063-19.261719 42.054688-19.246094 65.183594v2.203125c.074219 66.242188 53.757812 119.921875 120 120h112c66.242188-.078125 119.925781-53.757812 120-120v-2.203125c.011719-23.128906-6.671875-45.769531-19.25-65.183594zm-91.648438 144c24.84375.140625 45.472656 19.222656 47.554688 43.980469 2.078124 24.761719-15.082032 47.011719-39.554688 51.296875v16.722656h-16v-16.722656c-23.066406-3.917969-39.957031-23.882813-40-47.277344h16c0 17.671875 14.324219 32 32 32 17.671875 0 32-14.328125 32-32 0-17.675781-14.328125-32-32-32-24.847656-.144531-45.476562-19.226562-47.554688-43.984375-2.078124-24.757813 15.082032-47.011719 39.554688-51.296875v-16.71875h16v16.71875c23.066406 3.917969 39.957031 23.882812 40 47.28125h-16c0-17.675781-14.328125-32-32-32-17.675781 0-32 14.324219-32 32 0 17.671875 14.324219 32 32 32zm0 0"/><path d="m258.21875 110.9375 26.121094-104.472656-14.152344 7.535156c-2.351562 1.25-5.167969 1.25-7.519531 0l-26.273438-14-26.230469 13.992188c-2.351562 1.265624-5.179687 1.265624-7.527343 0l-26.226563-13.992188-26.214844 13.992188c-2.351562 1.253906-5.175781 1.253906-7.527343 0l-26.199219-13.992188-26.25 13.992188c-2.347656 1.265624-5.175781 1.265624-7.527344 0l-12.757812-6.808594 32.414062 103.753906zm0 0"/><path d="m359.035156 111.0625-62.800781 11.417969 49.890625-49.886719c3.03125-3.140625 2.988281-8.128906-.097656-11.214844-3.085938-3.085937-8.078125-3.128906-11.214844-.097656l-65.65625 65.65625h-188.6875c-4.417969 0-8 3.582031-8 8s3.582031 8 8 8h192c.480469 0 .957031-.042969 1.429688-.128906l88-16c4.347656-.792969 7.234374-4.957032 6.441406-9.304688-.789063-4.347656-4.957032-7.230468-9.304688-6.441406zm0 0"/></svg>
            <span class="ml-2 text-sm font-semibold">Expances</span>
        </a>
        <a href="" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="id-badge" class="svg-inline--fa fa-id-badge fa-w-12" role="img" height="448pt" viewBox="0 -40 448 448" width="448pt" xmlns="http://www.w3.org/2000/svg"><path d="m408 319.929688v-319.929688l-12.207031 1.023438c-48.957031 4.046874-96.976563 15.75-142.304688 34.6875l-21.488281 8.921874v318.664063l15.648438-6.503906c46.90625-19.515625 96.570312-31.589844 147.199218-35.792969zm0 0"/><path d="m448 47.296875h-24v280c.015625 4.171875-3.183594 7.65625-7.34375 8l-20.488281 1.679687c-5.914063.488282-11.8125 1.09375-17.6875 1.816407-1.90625.230469-3.800781.535156-5.695313.800781-3.960937.527344-7.914062 1.0625-11.855468 1.6875-2.296876.367188-4.578126.796875-6.867188 1.199219-3.527344.617187-7.0625 1.230469-10.582031 1.925781-2.402344.480469-4.800781 1.019531-7.25 1.539062-3.351563.710938-6.703125 1.4375-10.03125 2.230469-2.496094.59375-4.984375 1.222657-7.464844 1.855469-3.238281.800781-6.460937 1.664062-9.679687 2.5625-2.503907.6875-5.007813 1.414062-7.503907 2.148438-3.199219.945312-6.351562 1.90625-9.511719 2.914062-2.472656.800781-4.949218 1.601562-7.414062 2.398438-3.164062 1.066406-6.3125 2.167968-9.449219 3.304687-2.398437.871094-4.800781 1.746094-7.253906 2.664063-1.097656.417968-2.1875.863281-3.28125 1.289062h183.359375zm0 0"/><path d="m52.207031 1.023438-12.207031-1.023438v319.953125l14.199219 1.207031c50.597656 4.230469 100.21875 16.378906 147.046875 36l14.753906 6.136719v-318.664063l-21.464844-8.914062c-45.332031-18.941406-93.359375-30.648438-142.328125-34.695312zm0 0"/><path d="m0 47.296875v320h183.488281c-.984375-.386719-1.96875-.800781-2.960937-1.167969-2.289063-.871094-4.597656-1.703125-6.902344-2.542968-3.25-1.179688-6.496094-2.328126-9.769531-3.425782-2.367188-.800781-4.742188-1.578125-7.121094-2.335937-3.246094-1.066407-6.503906-2.070313-9.765625-3.007813-2.402344-.703125-4.800781-1.410156-7.199219-2.082031-3.289062-.910156-6.585937-1.773437-9.890625-2.621094-2.398437-.617187-4.800781-1.234375-7.253906-1.808593-3.351562-.800782-6.722656-1.535157-10.089844-2.257813-2.398437-.519531-4.800781-1.046875-7.199218-1.527344-3.488282-.6875-6.992188-1.304687-10.496094-1.917969-2.296875-.402343-4.59375-.800781-6.894532-1.210937-3.867187-.613281-7.746093-1.132813-11.625-1.65625-1.960937-.261719-3.90625-.574219-5.863281-.796875-5.867187-.710938-11.734375-1.316406-17.601562-1.816406l-21.535157-1.824219c-4.152343-.355469-7.335937-3.835937-7.320312-8v-280zm0 0"/></svg>
            <span class="ml-2 text-sm font-semibold">Books</span>
        </a>
        <a href="{{ route('assignrole.index') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-tag" class="svg-inline--fa fa-user-tag fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M630.6 364.9l-90.3-90.2c-12-12-28.3-18.7-45.3-18.7h-79.3c-17.7 0-32 14.3-32 32v79.2c0 17 6.7 33.2 18.7 45.2l90.3 90.2c12.5 12.5 32.8 12.5 45.3 0l92.5-92.5c12.6-12.5 12.6-32.7.1-45.2zm-182.8-21c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24c0 13.2-10.7 24-24 24zm-223.8-88c70.7 0 128-57.3 128-128C352 57.3 294.7 0 224 0S96 57.3 96 128c0 70.6 57.3 127.9 128 127.9zm127.8 111.2V294c-12.2-3.6-24.9-6.2-38.2-6.2h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 287.9 0 348.1 0 422.3v41.6c0 26.5 21.5 48 48 48h352c15.5 0 29.1-7.5 37.9-18.9l-58-58c-18.1-18.1-28.1-42.2-28.1-67.9z"></path></svg>
            <span class="ml-2 text-sm font-semibold">Assign Role</span>
        </a>
        <a href="{{ route('roles-permissions') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-cog" class="svg-inline--fa fa-user-cog fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M610.5 373.3c2.6-14.1 2.6-28.5 0-42.6l25.8-14.9c3-1.7 4.3-5.2 3.3-8.5-6.7-21.6-18.2-41.2-33.2-57.4-2.3-2.5-6-3.1-9-1.4l-25.8 14.9c-10.9-9.3-23.4-16.5-36.9-21.3v-29.8c0-3.4-2.4-6.4-5.7-7.1-22.3-5-45-4.8-66.2 0-3.3.7-5.7 3.7-5.7 7.1v29.8c-13.5 4.8-26 12-36.9 21.3l-25.8-14.9c-2.9-1.7-6.7-1.1-9 1.4-15 16.2-26.5 35.8-33.2 57.4-1 3.3.4 6.8 3.3 8.5l25.8 14.9c-2.6 14.1-2.6 28.5 0 42.6l-25.8 14.9c-3 1.7-4.3 5.2-3.3 8.5 6.7 21.6 18.2 41.1 33.2 57.4 2.3 2.5 6 3.1 9 1.4l25.8-14.9c10.9 9.3 23.4 16.5 36.9 21.3v29.8c0 3.4 2.4 6.4 5.7 7.1 22.3 5 45 4.8 66.2 0 3.3-.7 5.7-3.7 5.7-7.1v-29.8c13.5-4.8 26-12 36.9-21.3l25.8 14.9c2.9 1.7 6.7 1.1 9-1.4 15-16.2 26.5-35.8 33.2-57.4 1-3.3-.4-6.8-3.3-8.5l-25.8-14.9zM496 400.5c-26.8 0-48.5-21.8-48.5-48.5s21.8-48.5 48.5-48.5 48.5 21.8 48.5 48.5-21.7 48.5-48.5 48.5zM224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm201.2 226.5c-2.3-1.2-4.6-2.6-6.8-3.9l-7.9 4.6c-6 3.4-12.8 5.3-19.6 5.3-10.9 0-21.4-4.6-28.9-12.6-18.3-19.8-32.3-43.9-40.2-69.6-5.5-17.7 1.9-36.4 17.9-45.7l7.9-4.6c-.1-2.6-.1-5.2 0-7.8l-7.9-4.6c-16-9.2-23.4-28-17.9-45.7.9-2.9 2.2-5.8 3.2-8.7-3.8-.3-7.5-1.2-11.4-1.2h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c10.1 0 19.5-3.2 27.2-8.5-1.2-3.8-2-7.7-2-11.8v-9.2z"></path></svg>
            <span class="ml-2 text-sm font-semibold">Roles &amp; Permissions</span>
        </a>
        @endrole
        @role('Student')
        <a href="{{ route('planning.DisplayPlanning',['student' => Auth::user()->id]) }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-cog" class="svg-inline--fa fa-user-cog fa-w-20" role="img" id="Capa_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g><path d="m512 169c0-33.41 0-56.783 0-59 0-24.813-20.187-45-45-45h-6v55c0 8.284-6.716 15-15 15s-15-6.716-15-15c0-16.839 0-63.232 0-80 0-8.284-6.716-15-15-15s-15 6.716-15 15v25h-100v55c0 8.284-6.716 15-15 15s-15-6.716-15-15c0-16.839 0-63.232 0-80 0-8.284-6.716-15-15-15s-15 6.716-15 15v25h-100v55c0 8.284-6.716 15-15 15s-15-6.716-15-15c0-16.839 0-63.232 0-80 0-8.284-6.716-15-15-15s-15 6.716-15 15v25h-36c-24.813 0-45 20.187-45 45v59z"/><path d="m0 199v243c0 24.813 20.187 45 45 45h422c24.813 0 45-20.187 45-45 0-6.425 0-146.812 0-243-9.335 0-506.836 0-512 0zm144 208h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm128 128h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm128 128h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15z"/></g></svg>
            <span class="ml-2 text-sm font-semibold">Planning</span>
        </a>
        <a href="{{ route('attendance.show',['student' => Auth::user()->id]) }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="id-badge" class="svg-inline--fa fa-id-badge fa-w-12" role="img" height="448pt" viewBox="-56 0 448 448" width="448pt" xmlns="http://www.w3.org/2000/svg"><path d="m138.902344 51.273438c-1.003906-1.09375-1.949219-2.238282-2.832032-3.433594-.566406-.800782-1.140624-1.480469-1.65625-2.273438-.859374-1.371094-1.632812-2.800781-2.316406-4.269531-.363281-.738281-.800781-1.433594-1.089844-2.191406-.882812-2.15625-1.578124-4.386719-2.070312-6.664063 0-.144531-.097656-.273437-.128906-.417968v-.023438h-48.808594v40c0 4.417969 3.582031 8 8 8h160c4.417969 0 8-3.582031 8-8v-40h-48.800781c0 .144531-.09375.273438-.128907.414062-.492187 2.28125-1.1875 4.507813-2.070312 6.664063-.3125.800781-.726562 1.457031-1.089844 2.195313-.683594 1.46875-1.457031 2.894531-2.316406 4.269531-.515625.800781-1.089844 1.511719-1.65625 2.273437-.882812 1.195313-1.828125 2.339844-2.832031 3.429688-.671875.714844-1.371094 1.378906-2.089844 2.042968-1.070313.988282-2.199219 1.917969-3.375 2.78125-.800781.585938-1.601563 1.144532-2.402344 1.671876-1.273437.789062-2.59375 1.503906-3.949219 2.144531-.847656.417969-1.679687.847656-2.5625 1.203125-1.550781.585937-3.136718 1.082031-4.75 1.476562-.800781.203125-1.550781.480469-2.402343.640625-5.011719 1.023438-10.183594 1.023438-15.199219 0-.800781-.160156-1.597656-.4375-2.398438-.640625-1.613281-.394531-3.199218-.890625-4.753906-1.476562-.878906-.355469-1.710937-.800782-2.558594-1.203125-1.355468-.640625-2.675781-1.355469-3.953124-2.144531-.800782-.527344-1.597657-1.085938-2.398438-1.671876-1.175781-.863281-2.304688-1.792968-3.375-2.78125-.664062-.640624-1.363281-1.289062-2.035156-2.015624zm0 0"/><path d="m0 448h336v-416h-64v16h40c4.417969 0 8 3.582031 8 8v304c0 .175781-.089844.328125-.105469.503906-.039062.699219-.175781 1.394532-.40625 2.054688-.089843.257812-.152343.503906-.265625.753906-.386718.871094-.925781 1.664062-1.597656 2.34375l-64 64c-1.496094 1.488281-3.515625 2.332031-5.625 2.34375h-224c-4.417969 0-8-3.582031-8-8v-368c0-4.417969 3.582031-8 8-8h40v-16h-64zm0 0"/><path d="m259.089844 193.601562-11.328125-11.328124-106.105469 106.101562c-3.125 3.117188-8.179688 3.117188-11.304688 0l-31.640624-31.574219-11.3125 11.261719 48.601562 48.625zm0 0"/><path d="m192 24c0 13.253906-10.746094 24-24 24s-24-10.746094-24-24 10.746094-24 24-24 24 10.746094 24 24zm0 0"/><path d="m292.6875 368h-36.6875v36.6875zm0 0"/><path d="m64 72v-8h-32v352h208v-56c0-4.417969 3.582031-8 8-8h56v-288h-32v8c0 13.253906-10.746094 24-24 24h-160c-13.253906 0-24-10.746094-24-24zm29.070312 167.855469c3.125-3.113281 8.175782-3.113281 11.296876 0l31.632812 31.558593 106.105469-106.109374c3.121093-3.125 8.1875-3.125 11.308593 0l22.640626 22.640624c3.125 3.121094 3.125 8.1875 0 11.3125l-134.398438 134.398438c-3.125 3.121094-8.1875 3.121094-11.3125 0l-59.917969-59.921875c-1.503906-1.5-2.347656-3.535156-2.347656-5.660156 0-2.121094.84375-4.15625 2.347656-5.660157zm0 0"/></svg>
            <span class="ml-2 text-sm font-semibold">Attendance</span>
        </a>
        <a href="{{ route('attendance.index') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="id-badge" class="svg-inline--fa fa-id-badge fa-w-12" role="img" height="448pt" viewBox="0 -40 448 448" width="448pt" xmlns="http://www.w3.org/2000/svg"><path d="m408 319.929688v-319.929688l-12.207031 1.023438c-48.957031 4.046874-96.976563 15.75-142.304688 34.6875l-21.488281 8.921874v318.664063l15.648438-6.503906c46.90625-19.515625 96.570312-31.589844 147.199218-35.792969zm0 0"/><path d="m448 47.296875h-24v280c.015625 4.171875-3.183594 7.65625-7.34375 8l-20.488281 1.679687c-5.914063.488282-11.8125 1.09375-17.6875 1.816407-1.90625.230469-3.800781.535156-5.695313.800781-3.960937.527344-7.914062 1.0625-11.855468 1.6875-2.296876.367188-4.578126.796875-6.867188 1.199219-3.527344.617187-7.0625 1.230469-10.582031 1.925781-2.402344.480469-4.800781 1.019531-7.25 1.539062-3.351563.710938-6.703125 1.4375-10.03125 2.230469-2.496094.59375-4.984375 1.222657-7.464844 1.855469-3.238281.800781-6.460937 1.664062-9.679687 2.5625-2.503907.6875-5.007813 1.414062-7.503907 2.148438-3.199219.945312-6.351562 1.90625-9.511719 2.914062-2.472656.800781-4.949218 1.601562-7.414062 2.398438-3.164062 1.066406-6.3125 2.167968-9.449219 3.304687-2.398437.871094-4.800781 1.746094-7.253906 2.664063-1.097656.417968-2.1875.863281-3.28125 1.289062h183.359375zm0 0"/><path d="m52.207031 1.023438-12.207031-1.023438v319.953125l14.199219 1.207031c50.597656 4.230469 100.21875 16.378906 147.046875 36l14.753906 6.136719v-318.664063l-21.464844-8.914062c-45.332031-18.941406-93.359375-30.648438-142.328125-34.695312zm0 0"/><path d="m0 47.296875v320h183.488281c-.984375-.386719-1.96875-.800781-2.960937-1.167969-2.289063-.871094-4.597656-1.703125-6.902344-2.542968-3.25-1.179688-6.496094-2.328126-9.769531-3.425782-2.367188-.800781-4.742188-1.578125-7.121094-2.335937-3.246094-1.066407-6.503906-2.070313-9.765625-3.007813-2.402344-.703125-4.800781-1.410156-7.199219-2.082031-3.289062-.910156-6.585937-1.773437-9.890625-2.621094-2.398437-.617187-4.800781-1.234375-7.253906-1.808593-3.351562-.800782-6.722656-1.535157-10.089844-2.257813-2.398437-.519531-4.800781-1.046875-7.199218-1.527344-3.488282-.6875-6.992188-1.304687-10.496094-1.917969-2.296875-.402343-4.59375-.800781-6.894532-1.210937-3.867187-.613281-7.746093-1.132813-11.625-1.65625-1.960937-.261719-3.90625-.574219-5.863281-.796875-5.867187-.710938-11.734375-1.316406-17.601562-1.816406l-21.535157-1.824219c-4.152343-.355469-7.335937-3.835937-7.320312-8v-280zm0 0"/></svg>
            <span class="ml-2 text-sm font-semibold">Books</span>
        </a>
        @endrole 
    </div>
</div>