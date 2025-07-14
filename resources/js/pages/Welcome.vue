<script setup lang="ts">
import { ArrowPathIcon, CloudArrowUpIcon, Cog6ToothIcon, FingerPrintIcon, LockClosedIcon, ServerIcon } from '@heroicons/vue/20/solid';
import { BoltIcon, CalendarDaysIcon, UsersIcon } from '@heroicons/vue/24/outline';
import { Head, Link } from '@inertiajs/vue3';

const primaryFeatures = [
    {
        name: 'Server monitoring',
        description:
            'Non quo aperiam repellendus quas est est. Eos aut dolore aut ut sit nesciunt. Ex tempora quia. Sit nobis consequatur dolores incidunt.',
        href: '#',
        icon: BoltIcon,
    },
    {
        name: 'Collaborate',
        description:
            'Vero eum voluptatem aliquid nostrum voluptatem. Vitae esse natus. Earum nihil deserunt eos quasi cupiditate. A inventore et molestiae natus.',
        href: '#',
        icon: UsersIcon,
    },
    {
        name: 'Task scheduling',
        description:
            'Et quod quaerat dolorem quaerat architecto aliquam accusantium. Ex adipisci et doloremque autem quia quam. Quis eos molestiae at iure impedit.',
        href: '#',
        icon: CalendarDaysIcon,
    },
];
const secondaryFeatures = [
    {
        name: 'Push to deploy.',
        description: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit aute id magna.',
        icon: CloudArrowUpIcon,
    },
    {
        name: 'SSL certificates.',
        description: 'Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo.',
        icon: LockClosedIcon,
    },
    {
        name: 'Simple queues.',
        description: 'Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus.',
        icon: ArrowPathIcon,
    },
    {
        name: 'Advanced security.',
        description: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit aute id magna.',
        icon: FingerPrintIcon,
    },
    {
        name: 'Powerful API.',
        description: 'Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo.',
        icon: Cog6ToothIcon,
    },
    {
        name: 'Database backups.',
        description: 'Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. ',
        icon: ServerIcon,
    },
];
</script>

<template>
    <!--  TODO: fill placeholder text  -->
    <Head title="Welcome" />

    <div class="bg-gray-900">
        <main>
            <!-- Hero section -->
            <div class="relative isolate overflow-hidden">
                <svg
                    class="absolute inset-0 -z-10 size-full mask-[radial-gradient(100%_100%_at_top_right,white,transparent)] stroke-white/10"
                    aria-hidden="true"
                >
                    <defs>
                        <pattern id="983e3e4c-de6d-4c3f-8d64-b9761d1534cc" width="200" height="200" x="50%" y="-1" patternUnits="userSpaceOnUse">
                            <path d="M.5 200V.5H200" fill="none" />
                        </pattern>
                    </defs>
                    <svg x="50%" y="-1" class="overflow-visible fill-gray-800/20">
                        <path d="M-200 0h201v201h-201Z M600 0h201v201h-201Z M-400 600h201v201h-201Z M200 800h201v201h-201Z" stroke-width="0" />
                    </svg>
                    <rect width="100%" height="100%" stroke-width="0" fill="url(#983e3e4c-de6d-4c3f-8d64-b9761d1534cc)" />
                </svg>
                <div
                    class="absolute top-10 left-[calc(50%-4rem)] -z-10 transform-gpu blur-3xl sm:left-[calc(50%-18rem)] lg:top-[calc(50%-30rem)] lg:left-48 xl:left-[calc(50%-24rem)]"
                    aria-hidden="true"
                >
                    <div
                        class="aspect-1108/632 w-277 bg-linear-to-r from-[#80caff] to-[#4f46e5] opacity-20"
                        style="
                            clip-path: polygon(
                                73.6% 51.7%,
                                91.7% 11.8%,
                                100% 46.4%,
                                97.4% 82.2%,
                                92.5% 84.9%,
                                75.7% 64%,
                                55.3% 47.5%,
                                46.5% 49.4%,
                                45% 62.9%,
                                50.3% 87.2%,
                                21.3% 64.1%,
                                0.1% 100%,
                                5.4% 51.1%,
                                21.4% 63.9%,
                                58.9% 0.2%,
                                73.6% 51.7%
                            );
                        "
                    />
                </div>
                <header class="p-8 font-semibold text-white">
                    <nav class="flex items-center justify-end gap-6">
                        <Link v-if="$page.props.auth.user" :href="route('dashboard')"> Dashboard </Link>
                        <template v-else>
                            <Link :href="route('login')"> Log in </Link>
                            <Link :href="route('register')"> Register </Link>
                        </template>
                    </nav>
                </header>
                <div class="mx-auto max-w-7xl px-6 pt-10 pb-24 sm:pb-32 lg:flex lg:px-8 lg:py-40">
                    <div class="mx-auto max-w-2xl shrink-0 lg:mx-0 lg:pt-8">
                        <img class="size-25 rounded-full" src="/logo.png" alt="Society Hub" />

                        <h1 class="mt-10 text-5xl font-semibold tracking-tight text-pretty text-white sm:text-7xl">
                            Run Your University Society Like a Pro
                        </h1>
                        <p class="mt-8 text-lg font-medium text-pretty text-gray-400 sm:text-xl/8">
                            Manage members, plan events, track sign-ups, and grow your society—all from one intuitive platform. Built for student leaders who want to make an impact.
                        </p>
                        <div class="mt-10 flex items-center gap-x-6">
                            <Link
                                :href="route('register')"
                                class="rounded-md bg-slate-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-slate-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-400"
                            >
                                Get started
                            </Link>
                        </div>
                    </div>
                    <div class="mx-auto mt-16 flex max-w-2xl sm:mt-24 lg:mt-0 lg:mr-0 lg:ml-10 lg:max-w-none lg:flex-none xl:ml-32">
                        <div class="max-w-3xl flex-none sm:max-w-5xl lg:max-w-none">
                            <img
                                src="https://placehold.co/600x400"
                                alt="App screenshot"
                                width="2432"
                                height="1442"
                                class="w-304 rounded-md bg-white/5 shadow-2xl ring-1 ring-white/10"
                            />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Feature section -->
            <div class="mx-auto mt-32 max-w-7xl px-6 sm:mt-56 lg:px-8">
                <div class="mx-auto max-w-2xl lg:text-center">
                    <h2 class="text-base/7 font-semibold text-slate-400">Deploy faster</h2>
                    <p class="mt-2 text-4xl font-semibold tracking-tight text-pretty text-white sm:text-5xl lg:text-balance">
                        Everything you need to deploy your app
                    </p>
                    <p class="mt-6 text-lg/8 text-gray-300">
                        Quis tellus eget adipiscing convallis sit sit eget aliquet quis. Suspendisse eget egestas a elementum pulvinar et feugiat
                        blandit at. In mi viverra elit nunc.
                    </p>
                </div>
                <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-none">
                    <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-3">
                        <div v-for="feature in primaryFeatures" :key="feature.name" class="flex flex-col">
                            <dt class="text-base/7 font-semibold text-white">
                                <div class="mb-6 flex size-10 items-center justify-center rounded-lg bg-slate-500">
                                    <component :is="feature.icon" class="size-6 text-white" aria-hidden="true" />
                                </div>
                                {{ feature.name }}
                            </dt>
                            <dd class="mt-1 flex flex-auto flex-col text-base/7 text-gray-300">
                                <p class="flex-auto">{{ feature.description }}</p>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>

            <!-- Feature section -->
            <div class="mt-32 sm:mt-56">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div class="mx-auto max-w-2xl sm:text-center">
                        <h2 class="text-base/7 font-semibold text-slate-400">Everything you need</h2>
                        <p class="mt-2 text-4xl font-semibold tracking-tight text-pretty text-white sm:text-5xl sm:text-balance">
                            No server? No problem.
                        </p>
                        <p class="mt-6 text-lg/8 text-gray-300">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor
                            cupiditate blanditiis.
                        </p>
                    </div>
                </div>
                <div class="relative overflow-hidden pt-16">
                    <div class="mx-auto max-w-7xl px-6 lg:px-8">
                        <img
                            src="https://placehold.co/600x400"
                            alt="App screenshot"
                            class="mb-[-12%] rounded-xl shadow-2xl ring-1 ring-white/10"
                            width="2432"
                            height="1442"
                        />
                        <div class="relative" aria-hidden="true">
                            <div class="absolute -inset-x-20 bottom-0 bg-linear-to-t from-gray-900 pt-[7%]" />
                        </div>
                    </div>
                </div>
                <div class="mx-auto mt-16 max-w-7xl px-6 sm:mt-20 md:mt-24 lg:px-8">
                    <dl
                        class="mx-auto grid max-w-2xl grid-cols-1 gap-x-6 gap-y-10 text-base/7 text-gray-300 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3 lg:gap-x-8 lg:gap-y-16"
                    >
                        <div v-for="feature in secondaryFeatures" :key="feature.name" class="relative pl-9">
                            <dt class="inline font-semibold text-white">
                                <component :is="feature.icon" class="absolute top-1 left-1 size-5 text-slate-500" aria-hidden="true" />
                                {{ feature.name }}
                            </dt>
                            {{ ' ' }}
                            <dd class="inline">{{ feature.description }}</dd>
                        </div>
                    </dl>
                </div>
            </div>

            <!-- CTA section -->
            <div class="relative isolate mt-32 px-6 py-32 sm:mt-56 sm:py-40 lg:px-8">
                <svg
                    class="absolute inset-0 -z-10 size-full mask-[radial-gradient(100%_100%_at_top_right,white,transparent)] stroke-white/10"
                    aria-hidden="true"
                >
                    <defs>
                        <pattern id="1d4240dd-898f-445f-932d-e2872fd12de3" width="200" height="200" x="50%" y="0" patternUnits="userSpaceOnUse">
                            <path d="M.5 200V.5H200" fill="none" />
                        </pattern>
                    </defs>
                    <svg x="50%" y="0" class="overflow-visible fill-gray-800/20">
                        <path d="M-200 0h201v201h-201Z M600 0h201v201h-201Z M-400 600h201v201h-201Z M200 800h201v201h-201Z" stroke-width="0" />
                    </svg>
                    <rect width="100%" height="100%" stroke-width="0" fill="url(#1d4240dd-898f-445f-932d-e2872fd12de3)" />
                </svg>
                <div class="absolute inset-x-0 top-10 -z-10 flex transform-gpu justify-center overflow-hidden blur-3xl" aria-hidden="true">
                    <div
                        class="aspect-1108/632 w-277 flex-none bg-linear-to-r from-[#80caff] to-[#4f46e5] opacity-20"
                        style="
                            clip-path: polygon(
                                73.6% 51.7%,
                                91.7% 11.8%,
                                100% 46.4%,
                                97.4% 82.2%,
                                92.5% 84.9%,
                                75.7% 64%,
                                55.3% 47.5%,
                                46.5% 49.4%,
                                45% 62.9%,
                                50.3% 87.2%,
                                21.3% 64.1%,
                                0.1% 100%,
                                5.4% 51.1%,
                                21.4% 63.9%,
                                58.9% 0.2%,
                                73.6% 51.7%
                            );
                        "
                    />
                </div>
                <div class="mx-auto max-w-2xl text-center">
                    <h2 class="text-4xl font-semibold tracking-tight text-balance text-white sm:text-5xl">
                        Boost your productivity. Start using our app today.
                    </h2>
                    <p class="mx-auto mt-6 max-w-xl text-lg/8 text-gray-300">
                        Incididunt sint fugiat pariatur cupidatat consectetur sit cillum anim id veniam aliqua proident excepteur commodo do ea.
                    </p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <Link
                            :href="route('register')"
                            class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-xs hover:bg-gray-100 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
                        >
                            Get started
                        </Link>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="border-t border-white/10 py-12 md:flex md:items-center md:justify-between">
                <p class="mt-8 text-center text-sm/6 text-gray-400 md:order-1 md:mt-0">&copy; 2025 Society Hub, Inc. All rights reserved.</p>
            </div>
        </footer>
    </div>
</template>
