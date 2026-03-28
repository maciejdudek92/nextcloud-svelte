import axios from "@nextcloud/axios";
import { generateUrl } from "@nextcloud/router";

interface AppSettings {
  isEnabled: boolean;
  version: string;
}

export const fetchSettings = async (): Promise<AppSettings> => {
  const response = await axios.get(generateUrl("/apps/my_svelte_app/settings"));
  return response.data;
};
