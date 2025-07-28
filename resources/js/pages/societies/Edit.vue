<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button';
import { Calendar } from '@/components/ui/calendar';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Textarea } from '@/components/ui/textarea';
import Layout from '@/layouts/societies/Layout.vue';
import { cn } from '@/lib/utils';
import { Can, Society, University } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

import { Popover, PopoverContent, PopoverTrigger } from '@/components/ui/popover';
import { Switch } from '@/components/ui/switch';
import { DateFormatter, type DateValue, getLocalTimeZone, parseDate } from '@internationalized/date';
import { CalendarIcon } from 'lucide-vue-next';
import { Ref, ref } from 'vue';

interface Props {
    university: University;
    society: Society;
    can: Can;
}

const props = defineProps<Props>();

const form = useForm({
    name: props.society.name,
    description: props.society.description,
    email: props.society.email,
    facebook_url: props.society.facebook_url,
    instagram_handle: props.society.instagram_handle,
    twitter_handle: props.society.twitter_handle,
    discord_url: props.society.discord_url,
    meeting_schedule: props.society.meeting_schedule,
    meeting_location: props.society.meeting_location,
    founding_date: props.society.founding_date,
    is_active: props.society.is_active,
    is_official: props.society.is_official,
    category: props.society.category,
    tags: props.society.tags,
});

const df = new DateFormatter('en-US', {
    dateStyle: 'long',
});

const foundingDate = ref(parseDate(form.founding_date.toString())) as Ref<DateValue>;

const submit = () => {
    form.transform((data) => ({
        ...data,
        founding_date: foundingDate.value.toDate(getLocalTimeZone()),
    })).patch(route('universities.societies.update', { university: props.university, society: props.society }));
};
</script>

<template>
    <Head :title="society.name" />

    <Layout :university="university" :society="society" :can="can">
        <form @submit.prevent="submit" class="flex flex-col gap-6">
            <div class="grid gap-6 p-6">
                <div class="grid gap-2">
                    <Label>Name</Label>
                    <Input required v-model="form.name" placeholder="Society Name" />
                    <InputError :message="form.errors.name" />
                </div>

                <div class="grid gap-2">
                    <Label>Description</Label>
                    <Textarea v-model="form.description" placeholder="Description" />
                    <InputError :message="form.errors.description" />
                </div>

                <div class="grid gap-2">
                    <Label>Main Contact Email</Label>
                    <Input type="email" required v-model="form.email" placeholder="email@example.com" />
                    <InputError :message="form.errors.email" />
                </div>

                <div class="grid gap-2">
                    <Label>Facebook</Label>
                    <Input v-model="form.facebook_url" placeholder="https://www.facebook.com/sociecty" />
                    <InputError :message="form.errors.facebook_url" />
                </div>

                <div class="grid gap-2">
                    <Label>Instagram</Label>
                    <Input v-model="form.instagram_handle" placeholder="https://www.instagram.com/society" />
                    <InputError :message="form.errors.instagram_handle" />
                </div>

                <div class="grid gap-2">
                    <Label>Twitter</Label>
                    <Input v-model="form.twitter_handle" placeholder="https://x.com/society" />
                    <InputError :message="form.errors.twitter_handle" />
                </div>

                <div class="grid gap-2">
                    <Label>Discord</Label>
                    <Input v-model="form.discord_url" placeholder="https://discord.gg/society" />
                    <InputError :message="form.errors.discord_url" />
                </div>

                <div class="grid gap-2">
                    <Label>Meeting Schedule</Label>
                    <Input v-model="form.meeting_schedule" placeholder="" />
                    <InputError :message="form.errors.meeting_schedule" />
                </div>

                <div class="grid gap-2">
                    <Label>Meeting Location</Label>
                    <Input v-model="form.meeting_location" placeholder="" />
                    <InputError :message="form.errors.meeting_location" />
                </div>

                <div class="grid gap-2">
                    <Label>Founding Date</Label>
                    <Popover>
                        <PopoverTrigger as-child>
                            <Button
                                variant="outline"
                                :class="cn('w-full justify-start text-left font-normal', !foundingDate && 'text-muted-foreground')"
                            >
                                <CalendarIcon class="mr-2 h-4 w-4" />
                                {{ foundingDate ? df.format(foundingDate.toDate(getLocalTimeZone())) : 'Pick a date' }}
                            </Button>
                        </PopoverTrigger>
                        <PopoverContent class="w-auto p-0">
                            <Calendar v-model="foundingDate" initial-focus />
                        </PopoverContent>
                    </Popover>

                    <InputError :message="form.errors.founding_date" />
                </div>

                <div class="grid gap-2">
                    <Label>Is Active</Label>
                    <Switch v-model="form.is_active" />
                    <InputError :message="form.errors.is_active" />
                </div>

                <div class="grid gap-2">
                    <Label>Is Official</Label>
                    <Switch v-model="form.is_official" />
                    <InputError :message="form.errors.is_official" />
                </div>

                <div class="grid gap-2">
                    <Label>Category</Label>
                    <Input v-model="form.category" placeholder="Arts, Business, Science, etc." />
                    <InputError :message="form.errors.category" />
                </div>

                <Button type="submit" class="mt-4" :disabled="form.processing">
                    <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                    Save
                </Button>
            </div>
        </form>
    </Layout>
</template>
